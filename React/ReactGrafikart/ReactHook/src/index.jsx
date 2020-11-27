import React, { useState, useEffect } from 'react'
import {render} from 'react-dom'
import regeneratorRuntime from "regenerator-runtime"

function useIncrement(initial=0, step=1) {
    const [count, setCount]=useState(initial)
    const increment = () => {
        setCount( c => c + step)
    }
    return [count, increment]
}

/*function Compteur(){
    const [count,increment] = useIncrement(0, 2)

    useEffect(()=>{
        const timer =  window.setInterval(()=>{
            increment()
        },1000)

        return function () {
            clearInterval(timer)
        }
    },[])
    useEffect(()=>{
        document.title = "compteur "+ count
    },[count])
    return <>
    <button onClick={increment}>Incrementer {count}</button>
    </>
} */
function useAutoIncrement(initial=0,step=1){
    const [count,increment] = useIncrement(initial)
    useEffect(function(){
        const timer=window.setInterval(()=>{
            increment()
        },1000)

        return function(){
            clearInterval(timer)
        }
    },[])
    return count
}
function useToggle(initial = true){
        const [value,setValue] = useState(initial)
        const toggle = () => {
            setValue(v => !v)
        }
        return [value,toggle]
}
function useFetch (url){
    
    const [state,setState] = useState({
        items:[],
        loading: true
    })

    useEffect(function(){
        (async function() {
            const response = await fetch(url)
            const responseData = await response.json()
            if (response.ok) {
                setState({
                    items: responseData,
                    loading:false
                })
            }else{
                alert(JSON.stringify(responseData))
                setState(s => ({...s, loading:false}))
            }
            setLoading(false)
        })()
    },[])
    
    return [
        state.loading,
        state.items
    ]
}
function Compteur() {
    const count = useAutoIncrement(0,10)

    return <button >Incrementer {count}</button>
}

function App(){

    const [compteurVisible, toggleCompteur] = useToggle(true)

    return(
        <div>
            Afficher le compteur  <input type="checkbox" onChange={toggleCompteur} checked={compteurVisible}/>
            <br/>
            {compteurVisible && <Compteur/>}
            <TodoList />
            <PostTable />
        </div>
    )
}
function PostTable(){
    const [loading,items] = useFetch("https://jsonplaceholder.typicode.com/comments?_limit=10")
    
    if (loading){
        return "Chargement...."
    }

    return <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>Contenu</th>
            </tr>
        </thead>
        <tbody>
            {items.map(item =><tr key={item.id}>
                <td>{item.name}</td>
                <td>{item.email}</td>
                <td>{item.body}</td>
            </tr> )}
        </tbody>
    </table>
}

function TodoList(){
    const [loading,todos]= useFetch("https://jsonplaceholder.typicode.com/todos?_limit=10")


    if (loading){
        return "Chargement..."
    }

    return <ul>
        {todos.map(t => <li key ={t.id}>{t.title}</li>)}
    </ul>
}
render (
    <div>
        <App/>
    </div>,
    document.getElementById('app')
)