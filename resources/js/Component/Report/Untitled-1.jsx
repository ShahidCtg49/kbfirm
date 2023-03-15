{
    products.length > 0 && (
        products.map((row, key)=>(
            <tr key={key}>
                <td>{row.unit_price}</td>
                <td>{row.quantity}</td>
                <td>
                    
                </td>
                <td>
                    
                </td>
            </tr>
        ))
    )
}