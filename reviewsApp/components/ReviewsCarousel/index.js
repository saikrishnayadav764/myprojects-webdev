import {Component} from 'react'
import Profile from '../Profile'
import './index.css'

class ReviewsCarousel extends Component {
  state = {id: 0}

  moveBack = () => {
    const {reviewsList} = this.props
    const {id} = this.state

    if (id === 0) {
      return
    }

    this.setState(prevState => ({id: prevState.id - 1}))
  }

  moveFront = () => {
    const {reviewsList} = this.props
    const {id} = this.state
    const count = reviewsList.length

    this.setState(prevState => ({id: (prevState.id + 1) % count}))
  }

  render() {
    const {id} = this.state
    const {reviewsList} = this.props
    const currentReview = reviewsList[id]

    return (
      <div className="container">
        <div className="wrapper">
          <h1>Reviews</h1>
          <div className="wrapper2">
            <button
              type="button"
              data-testid="leftArrow"
              className="awrap"
              onClick={this.moveBack}
            >
              <img
                className="arrow"
                alt="left arrow"
                src="https://assets.ccbp.in/frontend/react-js/left-arrow-img.png"
              />
            </button>
            <Profile {...currentReview} />
            <button
              type="button"
              data-testid="rightArrow"
              className="awrap"
              onClick={this.moveFront}
            >
              <img
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
