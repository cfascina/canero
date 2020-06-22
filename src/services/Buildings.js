export const getBuildingsColumns = () => {
  return(
    [
      {
        label: 'Nome',
        accessor: 'name'
      },
      {
        label: 'Cidade',
        accessor: 'city'
      },
      {
        label: 'Status',
        accessor: 'status'
      }
    ]
  );
}

export const getBuildings = () => {
  return (
    [
      {
        id: 1,
        name: "Casa 01",
        city: "Hortolândia",
        status: 1
      },
      {
        id: 2,
        name: "Casa 02",
        city: "Sumaré",
        status: 1
      },
      {
        id: 3,
        name: "Casa 03",
        city: "Hortolândia",
        status: 1
      }
    ]
  );
}
