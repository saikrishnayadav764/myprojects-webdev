const Profile = props => {
  const {imgUrl, username, companyName, description} = props
  return (
    <div className="profile">
      <img className="pic" src={imgUrl} alt={username} />
      <p>{username}</p>
      <p className="desc">{companyName}</p>
      <p className="desc spec">{description}</p>
    </div>
  )
}

export default Profile
