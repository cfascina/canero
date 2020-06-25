import React, { Component } from "react";

class BuildingEdit extends Component {
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
        BuildingEdit: {this.state.buildingId}
      </div>
    );
  }
}

export default BuildingEdit;