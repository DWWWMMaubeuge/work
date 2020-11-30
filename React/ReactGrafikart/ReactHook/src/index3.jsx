import React, { useState, useEffect,useMemo,useCallback,useRef } from 'react'
import {render} from 'react-dom'
import regeneratorRuntime from "regenerator-runtime"

function App(){

    const input = useRef(null)
    const compteur = useRef({count:0})

    const handleButtonClick = function(e){
        compteur.current.count++
        console.log(compteur)
    }

    return (
        <div>
            <input type="text" ref={input}/>
            <button onClick={handleButtonClick}>Récupérer la valeur</button>
        </div>
    )
}

render(
    <App />,
    document.getElementById('app')
)