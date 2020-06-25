import React from "react";
import { useTable, usePagination, useSortBy } from "react-table";

function setTableColumns() {
  return(
    [
      { label: 'Cód.', accessor: 'id' },
      { label: 'Nome', accessor: 'name' },
      { label: 'Endereço', accessor: 'address' },
      { label: 'Número', accessor: 'number' },
      { label: 'Complemento', accessor: 'complement' },
      { label: 'CEP', accessor: 'zipCode' },
      { label: 'Bairro', accessor: 'neighborhood' },
      { label: 'Cidade', accessor: 'city' },
      { label: 'Estado', accessor: 'state' },
      { label: 'Status', accessor: 'status' },
      { label: 'Padrão', accessor: 'default' },
      { label: 'Data de Criação', accessor: 'createdAt' },
      { label: 'Data de Atualização', accessor: 'updatedAt' }
    ]
  );
}

function getColumnSorting(column, direction) {
  if (column.isSorted) {
    if (column.isSortedDesc) {
      return direction === "desc" ? "active" : "inactive";
    }
    else {
      return direction === "asc" ? "active" : "inactive";
    }
  }
  else
    return "inactive"
}

function Table({ columns, data }) {
  const
    {
      getTableProps,
      getTableBodyProps,
      prepareRow,
      headerGroups,
      page,
      canPreviousPage,
      canNextPage,
      pageOptions,
      pageCount,
      gotoPage,
      nextPage,
      previousPage,
      state: { pageIndex }
    } =
      useTable(
        {
          columns,
          data,
          initialState: { pageIndex: 0 }
        },
        useSortBy,
        usePagination
      );

  return (
    <div className="datatable">
      <table {...getTableProps()}>
        <thead>
          {headerGroups.map(headerGroup => (
            <tr {...headerGroup.getHeaderGroupProps()}>
              {headerGroup.headers.map(column => (
                <th {...column.getHeaderProps(column.getSortByToggleProps())}>
                  <span className={"sort " + getColumnSorting(column, "asc")}>&#9650;</span>
                  <span className={"sort " + getColumnSorting(column, "desc")}>&#9660;</span>
                  {column.render('label')}
                </th>
              ))}
            </tr>
          ))}
        </thead>
        <tbody {...getTableBodyProps()}>
          {page.map((row) => {
            prepareRow(row);

            return (
              <tr {...row.getRowProps()}>
                {row.cells.map(cell => {
                  return (
                    <td {...cell.getCellProps()}>
                      {cell.render('Cell')}
                    </td>
                  );
                })}
              </tr>
            );
          })}
        </tbody>
      </table>

      <div className="pagination">
        <button onClick={() => gotoPage(0)} disabled={!canPreviousPage}>
          {'<<'}
        </button>{' '}
        <button onClick={() => previousPage()} disabled={!canPreviousPage}>
          {'<'}
        </button>{' '}
        <button onClick={() => nextPage()} disabled={!canNextPage}>
          {'>'}
        </button>{' '}
        <button onClick={() => gotoPage(pageCount - 1)} disabled={!canNextPage}>
          {'>>'}
        </button>{' '}
        <span>
          Page{' '}
          <strong>
            {pageIndex + 1} of {pageOptions.length}
          </strong>{' '}
        </span>
      </div>
    </div>
  );
}

function DataTableBuildings(buildingArr) {
  const columns = setTableColumns();
  const data = buildingArr.data;  

  return <Table columns={columns} data={data} />;
}

export default DataTableBuildings;