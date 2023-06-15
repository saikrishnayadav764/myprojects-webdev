import {Component} from 'react'
import Profile from '../Profile'
import './index.css'

class ReviewsCarousel extends Component {
  state = {id: 0}

  moveBack = () => {
    const {reviewsList} = this.props
    const count = reviewsList.length
    this.setState(prevState => {
      if (prevState.id === 0) {
        return {id: prevState.id}
      }
      return {id: prevState.id - 1}
    })
  }

  // if (prevState.id === 0) {
  //   return {id: count - 1}
  // }

  // if (prevState.id === count - 1) {
  //   return {id: 0}
  // }

  moveFront = () => {
    const {reviewsList} = this.props
    const count = reviewsList.length
    this.setState(prevState => {
      if (prevState.id === count - 1) {
        return {id: prevState.id}
      }
      return {id: prevState.id + 1}
    })
  }

  render() {
    const {id} = this.state
    const {reviewsList} = this.props
    const [result] = reviewsList.filter((item, ind) => ind === id)
    return (
      <div className="container">
        <div className="wrapper">
          <h1>Reviews</h1>
          <div className="wrapper2">
            <button data-testid="leftArrow" className="awrap">
              <img
                onClick={this.moveBack}
                className="arrow"
                alt="left arrow"
                src="https://assets.ccbp.in/frontend/react-js/left-arrow-img.png "
              />
            </button>
            <Profile {...result} />
            <button data-testid="rightArrow" className="awrap">
              <img
                onClick={this.moveFront}
                className="arrow"
                alt="right arrow"
                src="https://assets.ccbp.in/frontend/react-js/right-arrow-img.png"
              />
            </button>
          </div>
        </div>
      </div>
    )
  }
}

export default ReviewsCarousel
