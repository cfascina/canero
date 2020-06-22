import React, { Component } from 'react';

import DataTableBuildings from '../components/datatables/DataTableBuildings';

class Buildings extends Component {
  render() {
    return (
      <div>
        <div>Obras</div>
        <div>DataTableBuildings</div>
        <DataTableBuildings />
      </div>
    );
  }
}

export default Buildings;