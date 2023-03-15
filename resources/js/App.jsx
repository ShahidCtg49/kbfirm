import React from 'react';
import { createRoot } from 'react-dom/client';
import IncomeReport from './Component/Report/IncomeReport';

export default function App(){
    return(
        <>
			<h1> </h1>
			<IncomeReport />
        </>
    );
}

if(document.getElementById('root')){
    createRoot(document.getElementById('root')).render(<App />)
}
