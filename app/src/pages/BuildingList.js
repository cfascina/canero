import React, { Component } from "react";
import axios from "axios";
import DataTableBuildings from "../components/datatables/DataTableBuildings";

class BuildingList extends Component {
  constructor(props) {
    super(props);

    this.state = {
      buildingsArr: []
    }
  }

  componentDidMount() {
    axios.get("http://127.0.0.1:8080/requests/buildings/get/")
      .then(response => {
        this.setState({ buildingsArr: response.data });
      })
      .catch(error => {
        console.log("Error: " + error)
      });
  }

  render() {
    return (
      <div>
        <DataTableBuildings data={this.state.buildingsArr} />
      </div>
    );
  }
}

export default BuildingList;