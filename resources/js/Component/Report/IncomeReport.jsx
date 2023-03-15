import React,{ useEffect, useState }  from 'react';
import axios from 'axios';

export default function IncomeReport(){
    const [Opincome, setOpincome] = useState([]);
    const [Opincometotal, setOpincometotal] = useState();
    const [Opexpense, setOpexpense] = useState([]);
    const [Opexpensetotal, setOpexpensetotal] = useState();
    const [Nonopinc, setNonopinc] = useState([]);
    const [Nonopincome, setNonopincome] = useState([]);
    const [Nonopexp, setNonopexp] = useState([]);
    const [Nonopexpense, setNonopexpense] = useState([]);
    const [Taxamount, setTaxamount] = useState([]);
    const [Tax, setTax] = useState([]);
    let years= [];
    for (var i = 2020; i <= new Date().getFullYear(); i++) {
        years.push(i);
    }

    useEffect(()=>{
        fetchIncomest() 
    },[]);

 
    const fetchIncomest = () => {
        var year=document.getElementById('year').value;
        var month=document.getElementById('month').value;
        
         axios.get(`http://localhost:8000/api/incomereport?year=${year}&month=${month}`).then(({data})=>{
            setOpincome(data.opincome);
            setOpincometotal(data.opinc);
            setOpexpense(data.opexpense);
            setOpexpensetotal(data.opexp);
            setNonopinc(data.nonopinc);
            setNonopincome(data.nonopincome);
            setNonopexp(data.nonopexp);
            setNonopexpense(data.nonopexpense);
            setTaxamount(data.taxamount);
            setTax(data.tax);
            console.log(data);
        })
    }
    return(
        <div className="container">
          <div className="row">
            <div className="col-12">
                <div className="card card-body">
                <h3>Income Statement</h3>
                    <div className="row">
                        <div className="col-sm-4">
                            <div className="form-group">
                                <label className="form-label">Month</label>
                                <select id="month" className="form-control">
                                <option value="">Select Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                                </select>
                            </div>
                        </div>
                        <div className="col-sm-4">
                            <div className="form-group">
                                <label className="form-label">Year</label>
                                <select id="year" className="form-control">
                                    {
                                    years.length > 0 && (
                                        years.map((row, key)=>(
                                            <option key={key} value={row}>{row}</option>
                                        ))
                                    )
                                }
                                </select>
                            </div>
                        </div>
                        <div className="col-sm-4 pt-3 mt-2">
                            <button onClick={() => fetchIncomest()} className="btn btn-success" type="button" >Get Report</button>
                        </div>
                    </div>
                
                    <div className="table-responsive">
                        <table className="table table-bordered mb-0 text-center">
                            <thead>
                                <tr>
                                    <th> Particulars </th>
                                    <th> Amount </th>
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    Opincome.length > 0 && (
                                        Opincome.map((row, key)=>(
                                            <tr key={key}>
                                                <td>{row.journal_title}</td>
                                                <td>{row.cr}</td>
                                            </tr>
                                        ))
                                    )
                                }
                                <tr>
                                    <th> Gross Operating Income </th>
                                    <th> {Opincometotal} </th>
                                </tr>
                                {
                                    Opexpense.length > 0 && (
                                        Opexpense.map((row, key)=>(
                                            <tr key={key}>
                                                <td>{row.journal_title}</td>
                                                <td>{row.dr}</td>
                                            </tr>
                                        ))
                                    )
                                }
                                <tr>
                                    <th> Gross Operating Expense </th>
                                    <th> {Opexpensetotal} </th>
                                </tr>
                                <tr>
                                    <th> Net Operating Income </th>
                                    <th> {Opincometotal - Opexpensetotal} </th>
                                </tr>
                                {
                                    Nonopincome.length > 0 && (
                                        Nonopincome.map((row, key)=>(
                                            <tr key={key}>
                                                <td>{row.journal_title}</td>
                                                <td>{row.cr}</td>
                                            </tr>
                                        ))
                                    )
                                }
                                <tr>
                                    <th> Gross Nonoperating Income </th>
                                    <th> {Nonopinc} </th>
                                </tr>
                                {
                                    Nonopexpense.length > 0 && (
                                        Nonopexpense.map((row, key)=>(
                                            <tr key={key}>
                                                <td>{row.journal_title}</td>
                                                <td>{row.dr}</td>
                                            </tr>
                                        ))
                                    )
                                }
                                <tr>
                                    <th> Gross Nonoperating Expense </th>
                                    <th> {Nonopexp} </th>
                                </tr>
                                <tr>
                                    <th> Net Nonoperating Income </th>
                                    <th> {Nonopinc - Nonopexp} </th>
                                </tr>
                                <tr>
                                    <th> Net Income Before Tax </th>
                                    <th> {((Nonopinc + Opincometotal)  - (Opexpensetotal + Nonopexp))} </th>
                                </tr>
                                {
                                    Taxamount.length > 0 && (
                                        Taxamount.map((row, key)=>(
                                            <tr key={key}>
                                                <td>{row.journal_title}</td>
                                                <td>{row.dr}</td>
                                            </tr>
                                        ))
                                    )
                                }
                                <tr>
                                    <th> Net Income </th>
                                    <th> {((Nonopinc + Opincometotal)  - (Opexpensetotal + Nonopexp + Tax))} </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
      </div>
    );
}