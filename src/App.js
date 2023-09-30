import React, { useState, useEffect } from 'react';
import Papa from 'papaparse';
import Modal from 'react-modal'; 
import { saveAs } from 'file-saver';

import './App.css';

function App() {
  const [csvData, setCsvData] = useState([]);
  const [header, setHeader] = useState([]);
  const [isDragging, setIsDragging] = useState(false);
  const [filters, setFilters] = useState({});
  const [markedColumns, setMarkedColumns] = useState([]);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [selectedColumns, setSelectedColumns] = useState([]);

  const handleConfirm = () => {
    // Create a new CSV data array with only selected columns
    const updatedData = csvData.map((row) => {
      const newRow = {};
      selectedColumns.forEach((column) => {
        newRow[column] = row[column];
      });
      return newRow;
    });

    // Create CSV content from the updated data
    const csvContent = Papa.unparse({
      fields: selectedColumns,
      data: updatedData,
    });

    // Create a Blob object for the CSV content
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8' });

    // Generate a unique filename (e.g., timestamp) or use a specific name
    const filename = 'updated_data.csv';

    // Trigger the download using the FileSaver.js saveAs function
    saveAs(blob, filename);
  };

  const showModal = () => {
    setSelectedColumns(markedColumns);
    setIsModalOpen(true);
  };

  const closeModal = () => {
    setIsModalOpen(false);
  };

  const handleDrop = (e) => {
    e.preventDefault();
    setIsDragging(false);
    handleFileUpload(e.dataTransfer.files[0]);
  };

  const handleDragOver = (e) => {
    e.preventDefault();
    setIsDragging(true);
  };

  const handleDragLeave = () => {
    setIsDragging(false);
  };

  const handleFileInputChange = (e) => {
    const file = e.target.files[0];
    handleFileUpload(file);
  };

  const handleFileUpload = (file) => {
    if (file) {
      parseCsv(file);
    }
  };

  const parseCsv = (file) => {
    Papa.parse(file, {
      header: true,
      dynamicTyping: true,
      skipEmptyLines: true,
      complete: function (results) {
        setHeader(results.meta.fields);
        setCsvData(results.data);
        const initialFilters = {};
        results.meta.fields.forEach((column) => {
          initialFilters[column] = '';
        });
        setFilters(initialFilters);
        setMarkedColumns([]); // Reset marked columns when a new file is uploaded
      },
    });
  };

  const toggleColumn = (column) => {
    if (markedColumns.includes(column)) {
      setMarkedColumns(markedColumns.filter((col) => col !== column));
    } else {
      setMarkedColumns([...markedColumns, column]);
    }
  };

  useEffect(() => {
    // Optional: Load an initial CSV file on component mount
    // parseCsv('/path/to/your.csv');
  }, []);

  return (
    <div className={`csv-table-container ${isDragging ? 'dragging' : ''}`}>
      <h1>CSV IMPORTER</h1>
      <div
        className="csv-drop-zone"
        onDrop={handleDrop}
        onDragOver={handleDragOver}
        onDragLeave={handleDragLeave}
      >
        <p>Drag and drop a CSV file here, or click to select one.</p>
      </div>
      <input
        type="file"
        accept=".csv"
        id="csv-file-input"
        onChange={handleFileInputChange}
        style={{ display: 'none' }}
      />
      <label htmlFor="csv-file-input" className="csv-upload-button">
        Upload CSV
      </label>
      <br/>
      {csvData.length > 0 && (
        <div className="csv-filter-container">
          {header.map((column) => (
            <label key={column} className="column-label">
              <input
                type="checkbox"
                onChange={() => toggleColumn(column)}
                checked={markedColumns.includes(column)}
              />
              <span className="column-name">{column}</span>
            </label>
          ))}
        </div>
      )}

      <button
        onClick={showModal}
        style={{ textAlign: 'center', marginTop: '10px' }}
        className="import-button"
      >
        Import
      </button>

      <Modal
        isOpen={isModalOpen}
        onRequestClose={closeModal}
        contentLabel="Selected Columns Modal"
        className="modal"
      >
        <button onClick={closeModal} className="close-modal-button">
          Close
        </button>
        <div className="selected-columns-container">
          {selectedColumns.map((column) => (
            <div key={column} className="selected-column">
              <span className="selected-column-name">{column}</span>
            </div>
          ))}
        </div>
        <button onClick={handleConfirm} className="confirm-button">
          Confirm
        </button>
      </Modal>
    </div>
  );
}

export default App;
