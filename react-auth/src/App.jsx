//import react router dom
import { Routes, Route } from "react-router-dom";


//import component Register
import Register from './pages/Register';

//import component Login
import Login from './pages/Login';

//import component Register
import Dashboard from './pages/Dashboard';

function App() {
  return (
    <>

      <Routes>
        <Route exact path="/" element={<Login />} />
        <Route  path="/register" element={<Register />} />
        <Route  path="/dashboard" element={<Dashboard />} />
      </Routes>
    </>
  );
}

export default App;
