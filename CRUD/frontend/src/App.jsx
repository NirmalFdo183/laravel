import React, { useEffect, useState } from 'react'
import axios from "../src/api/axios"

const App = () => {
  const [todos,setTodos] = useState([]);
  const [title,setTitle] = useState("");

  useEffect(()=>{
    fetchTodos();
  },[]);

  const fetchTodos = async ()=> {
    const res = await axios.get("/todos");
    setTodos(res.data);
  }



  return (
    <>
      <ul>
        {todos.map((todo,index)=>{
          return <li key={index}>{todo.title}</li>
        })}
      </ul>
    </>  
  )
}

export default App