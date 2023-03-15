import React,{ useEffect, useState }  from 'react';
import axios from 'axios';

export default function Stock(){
    const [products, setProducts] = useState([])

    useEffect(()=>{
        fetchProducts() 
    },[])

    const fetchProducts = async () => {
        await axios.get(`http://localhost:8000/api/sreport`).then(({data})=>{
            setProducts(data)
        })
    }
    return(
        <div className="container">
          <div className="row">
            <div className="col-12">
                <div className="card card-body">
                    <div className="table-responsive">
                        <table className="table table-bordered mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    products.length > 0 && (
                                        products.map((row, key)=>(
                                            <tr key={key}>
                                                <td>{row.product_name}</td>
                                                <td>{row.quantity}</td>
                                                <td>
                                                    {row.unit_price}
                                                </td>
                                                <td>
												{Math.round(row.quantity * row.unit_price)}
                                                </td>
                                            </tr>
                                        ))
                                    )
                                }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
      </div>
    );
}