import React, { useState, useEffect,useMemo,useCallback,useRef,useLayoutEffect,useReducer} from 'react'
import {render} from 'react-dom'
import regeneratorRuntime from "regenerator-runtime"

function init (initialValue){
    return {count: initialValue}
}

function reducer(state,action){
    switch(action.type){
        case 'increment':
            return {count: state.count+ (action.payload || 1)};
        case 'decrement':
            if(state.count <=0) {
                return state
            }
            return {count : state.count -1 };
        case 'reset':
            return init(0)
        default:
            throw new Error ("L'action "+action.type +" est inconnu")
    }
}
function App() {

    const [count, dispatch] = useReducer(reducer, 0, init)

    return (
        <div>
            Compteur : {JSON.stringify(count)}
            <button onClick={()=>dispatch({type: 'increment'})}>Incrémenter</button>
            <button onClick={()=>dispatch({type: 'increment', payload : 10})}>Incrémenter x10</button>
            <button onClick={()=>dispatch({type: 'decrement'})}>Décrémenter</button>
            <button onClick={()=>dispatch({type: 'reset'})}>Reset</button>
            <Child />
        </div>
    )
}

function Child() {
    console.log('render')
    return <div></div>
}
render (<App />,document.getElementById('app'))