import React from "react"
import {BrowserRouter as Router, Route} from "react-router-dom"
import Registration from "./pages/Registration"
import Main from "./pages/Main"
function App() {

  return (
    <Router>
      <Route path='/registration' exact render={(props) => <Registration />} />{" "}
      <Route path='/' exact render={(props) => <Main />} />{" "}
    </Router>
  )
}
export default App