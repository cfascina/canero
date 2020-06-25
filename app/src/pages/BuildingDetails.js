import React, { Component } from "react";

class BuildingDetails extends Component {
  constructor(props) {
    super(props);

    this.state = {
      buildingId: this.props.match.params.id
    }
  }

  componentDidMount() {}

  render() {
    return (
      <div>
        BuildingDetails: {this.state.buildingId}
      </div>
    );
  }
}

export default BuildingDetails;