import React, { useState, useEffect,useMemo,useCallback,useRef,useLayoutEffect,useReducer,useContext,createContext} from 'react'
import {render} from 'react-dom'
import regeneratorRuntime from "regenerator-runtime"


const FormContext=createContext({})

function FormWithContext({defaultValue, onSubmit, children}){

    const [data, setData] = useState(defaultValue)
    const change = useCallback(function(name,value){
        setData (d => Object.assign({},d, {[name]: value}))
    })
    const value=useMemo(function(){
        return Object.assign({}, data, {change: change})
    },[data, change])

    return (
        <FormContext.Provider value={data}>
            <form onSubmit={onSubmit}>
                {children}
            </form>
            {JSON.stringify(value)}
        </FormContext.Provider>
    )
}

function FormField ({name,children}){
    const data = useContext(FormContext)
    const handleChange = useCallback(function(e){
        data.change(e.target.name, e.target.value)
    },[data.change])
    return (
        <div className="form-group">
            <label htmlFor={name}>{children}</label>
            <input type="text" name={name} id={name} className='form-control' value={data[name] || ''} onChange={handleChange}/>
        </div>
    )
}

function PrimaryButton({children}) {
    return <button className='btn btn-primary'>{children}</button>
}

function App(){

    const handleSubmit = useCallback(function(value){
        console.log(value)
    },[])

    return (
        <div className="container">
            <FormWithContext defaultValue={{name:'Doe', firstname: 'John'}}  onSubmit={handleSubmit}>
                <FormField name="name">Nom</FormField>
                <FormField name="firstname">Prénom</FormField>
                <PrimaryButton>Envoyer</PrimaryButton>
            </FormWithContext>
        </div>
    )
}

render(<App/>,document.getElementById('app'))