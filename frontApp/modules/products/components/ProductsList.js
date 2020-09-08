import React from 'react';
import { MDBDataTable } from 'mdbreact';
import numeral from 'numeral';
import '../styles/ProductList.styl';
import '../styles/Product.styl';
import ProductForm from './ProductForm';

const data = {
  columns: [
    {
      label: '#',
      field: 'index',
      width: 1000,
      sortable: false,
    },
    {
      label: 'Товар',
      field: 'titleRender',
      width: 3500,
    },
    {
      label: 'Цена',
      field: 'priceRender',
      width: 2000,
    },
    {
      label: 'Заказать',
      field: 'formRender',
      width: 3500,
      sortable: false,
    },
  ],
};

const prepareList = (list) => list.map((p, i) => ({
  ...p,
  index: i + 1,
  titleRender: <><span className="td-title">Товар</span>{p.title}</>,
  priceRender: <><span className="td-title">Цена</span>{numeral(p.price).format('0.00')} руб. / {p.measure}</>,
  formRender: <ProductForm {...p}/>,
}));
export default ({ title, list }) => (
  <div className="product-list">
    <h3>{title}</h3>
    <MDBDataTable
      className="table table-striped table-hover table-sm table-adaptive"
      data={{ ...data, rows: prepareList(list) }}
      noBottomColumns
      paginationLabel={['<', '>']}
      pagesAmount={5}
      searching={false}
      displayEntries={false}
      info={false}
      paging={list.length > 10}
    />
    <hr/>
  </div>
);

// export default ({ title, list }) => (
//   <div className="product-list">
//     <h3>{title}</h3>
//     <MDBTable className="table table-striped table-hover table-sm table-adaptive">
//       <MDBTableHead className="thead-dark">
//
//         <tr>
//           <th scope="col" width="10%">#</th>
//           <th scope="col" width="35%">Товар</th>
//           <th scope="col" width="20%">Цена</th>
//           <th scope="col" width="35%" className="text-center">Заказать</th>
//         </tr>
//       </MDBTableHead>
//       <MDBTableBody>
//         {list.map(
//           (product, index) => (<Product {...product} index={index + 1}/>))}
//       </MDBTableBody>
//     </MDBTable>
//     <hr/>
//   </div>
// );
