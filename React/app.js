function WelcomeFunc({name,children}){
    return (
    <div>
        <h1>bonjour {name}</h1>
        <p>{children}</p>
    </div>
    )
}
class Welcome extends React.Component{
    render(){
        return (
            <div>
                <h1>bonjour {this.props.name}</h1>
                <p>{this.props.children}</p>
            </div>
            )
            
    }
}
class Clock extends React.Component{

    constructor(props){
        super(props)
        this.state ={date: new Date}
        this.timer= null
    }

    componentDidMount(){
        this.timer=window.setInterval(this.tick.bind(this),1000)
    }

    ComponentWillUnmount(){
        window.clearInterval(this.timer)
    }

    tick(){
        this.setState({date: new Date})
    }
    render(){
        const date = new Date();
        return <div>
            il est {this.state.date.toLocaleDateString()} {this.state.date.toLocaleTimeString()}
        </div>
    }

}

class Incrementer extends React.Component{

    constructor(props){

        super(props)
        this.state = {
            compteur: props.start
        }
        this.timer=null
    }

    componentDidMount(){
        window.setInterval(this.increment.bind(this), 1000)
    }

    ComponentWillUnmount(){
        window.clearInterval(this.timer)
    }

    increment(){
        this.setState((state,props) => ({compteur: state.compteur +  props.step})
        )
    }
    render(){
        return (
        <div>
            compteur : {this.state.compteur}
            <button>pause</button>
        </div>
        )
    }

} 

Incrementer.defautlProps = {
    start: 0,
    step: 1
}

class ManualIncrementer extends React.Component{

    constructor(props){
        super(props)
        this.state = {n: 0}
    }

    increment(e) {
        e.preventDefault
        this.setState((state, props) => ({n: state.n + 1}))
    }

    render(){
        return <div>valeur : {this.state.n} <button onClick={() => this.increment()}>Incrémenter</button></div>
    }
}

function Home (){
    return (
    <div>
        <Welcome name="jean" />
        <Welcome name="jacques" />
        <Clock />
        <Incrementer start={100}  step={10}/>
        <ManualIncrementer />
    </div>
    )
    
}

ReactDOM.render(
    <Home />,
    document.querySelector('#app')
)

