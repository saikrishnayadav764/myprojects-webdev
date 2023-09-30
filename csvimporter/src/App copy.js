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
  const [markedRows, setMarkedRows] = useState([]);
  const [markedColumns, setMarkedColumns] = useState([]);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [selectedData, setSelectedData] = useState({ data: [], columns: [] });

 
  const handleConfirm = () => {
    // Create CSV content from the selected data
    const csvContent = Papa.unparse({
      fields: selectedData.columns,
      data: selectedData.data,
    });
  
    // Create a Blob object for the CSV content
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8' });
  
    // Generate a unique filename (e.g., timestamp) or use a specific name
    const filename = 'updated_data.csv';
  
    // Trigger the download using the FileSaver.js saveAs function
    saveAs(blob, filename);
  };
  

  const showModal = () => {
    const filteredData = csvData.filter((row, rowIndex) =>
      markedRows.includes(rowIndex)
    );
    const filteredColumns = header.filter((column) =>
      markedColumns.includes(column)
    );

    setSelectedData({
      data: filteredData,
      columns: filteredColumns,
    });

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



  
  const filterData = () => {
    let filteredData = csvData;
    for (const column in filters) {
      const filterValue = filters[column].toLowerCase();
      if (filterValue) {
        filteredData = filteredData.filter((row) =>
          String(row[column]).toLowerCase().includes(filterValue)
        );
      }
    }
    return filteredData;
  };

  const toggleRow = (index) => {
    if (markedRows.includes(index)) {
      setMarkedRows(markedRows.filter((rowIndex) => rowIndex !== index));
    } else {
      setMarkedRows([...markedRows, index]);
    }
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
      {csvData.length > 0 && (
        <div className="csv-filter-container">
          {header.map((column) => (
            <input
              key={column}
              type="text"
              placeholder={`Filter ${column}`}
              value={filters[column]}
              onChange={(e) =>
                setFilters({ ...filters, [column]: e.target.value })
              }
            />
          ))}
        </div>
      )}
      <table>
        <thead>
          <tr>
            <th></th>
            {header.map((column) => (
              <th key={column}>
                <input
                  type="checkbox"
                  onChange={() => toggleColumn(column)}
                  checked={markedColumns.includes(column)}
                />
                <span
                  onClick={() => toggleColumn(column)}
                  className={`column-toggle ${
                    markedColumns.includes(column) ? 'marked' : ''
                  }`}
                >
                  {column}
                </span>
              </th>
            ))}
          </tr>
        </thead>
        <tbody>
          {filterData().map((row, rowIndex) => (
            <tr key={rowIndex}>
              <td>
                <input
                  type="checkbox"
                  onChange={() => toggleRow(rowIndex)}
                  checked={markedRows.includes(rowIndex)}
                />
              </td>
              {header.map((column) => (
                <td key={column}>{row[column]}</td>
              ))}
            </tr>
          ))}
        </tbody>
      </table>
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
        contentLabel="Selected Data Modal"
        className="modal"
      >
        <button onClick={closeModal} className="close-modal-button">
          Close
        </button>
        <table className="selected-data-table">
          <thead>
            <tr>
              {selectedData.columns.map((column) => (
                <th key={column}>{column}</th>
              ))}
            </tr>
          </thead>
          <tbody>
            {selectedData.data.map((row, rowIndex) => (
              <tr key={rowIndex}>
                {selectedData.columns.map((column) => (
                  <td key={column}>{row[column]}</td>
                ))}
              </tr>
            ))}
          </tbody>
        </table>
        <button onClick={handleConfirm} className="confirm-button">
          Confirm
        </button>
      </Modal>
    </div>
  );
}

export default App;
