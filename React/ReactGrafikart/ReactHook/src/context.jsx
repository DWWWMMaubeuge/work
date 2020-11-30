import React, { useState, useEffect,useMemo,useCallback,useRef,useLayoutEffect,useReducer,useContext} from 'react'
import {render} from 'react-dom'
import regeneratorRuntime from "regenerator-runtime"

const THEMES={
    dark : {
        background: '#000',
        color: "#FFF",
        border: "solid 1px #FFF"
    },
    light : {
        background: "#FFF",
        color : "#000",
        border: "solid 1px #000"
    }
}
const ThemeContext = React.createContext({
    theme: THEMES.dark,
    toggleTheme : () => {}
})

function SearchForm(){
    return (
        <div>
            <input />
            <ThemedButtonClass>Rechercher</ThemedButtonClass>
        </div>
    )
}
function Toolbar(){
    return (
        <div>
            <SearchForm />
            <ThemedButton>M'inscrire</ThemedButton>
        </div>
    )
}
function ThemedButton ({children}){
    const {theme} = useContext(ThemeContext)
    return <button style={theme}>{children}</button>

}

class ThemedButtonClass extends React.Component{

    render () {
        const {children} = this.props
        const {theme}= this.context
        return <button style={theme}>{children}</button>
    }
}
ThemedButtonClass.contextType= ThemeContext

function App() {

    const [theme , setTheme] = useState('light')
    const toggleTheme = useCallback(function(){
        setTheme( t => t === 'light'?'dark': 'light')
    },[])


    const value = useMemo(function(){
        return {
            theme: theme === 'light' ? THEMES.light : THEMES.dark,
            toggleTheme
        }
    }, [toggleTheme,theme])

    return(
        <div>
            <ThemeContext.Provider value={value}>
                <Toolbar/>
                <ThemeSwitcher />
            </ThemeContext.Provider>
        </div>
    )
}

function ThemeSwitcher () {
    const {toggleTheme} = useContext(ThemeContext)
    return <button onClick={toggleTheme}>toggle theme</button>
}

render(<App/>,document.getElementById('app'))