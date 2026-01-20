import { useEffect, useState } from "react";
import axios from "../src/api/axios";
import "../src/App.css"

function App() {
  const [todos, setTodos] = useState([]);
  const [title, setTitle] = useState("");
  const [priority, setPriority] = useState("low");
  const [editId, setEditId] = useState(null);

  const fetchTodos = async () => {
    const res = await axios.get("/todos");
    setTodos(res.data);
  };

  const addTodo = async () => {
    if (!title) return;

    if (editId) {
      await axios.put(`/todos/${editId}`, { title: title, priority: priority });
      setEditId(null);
    } else {
      await axios.post("/todos", {
        title: title,
        priority: priority,
        completed: false,
      });
    }

    setTitle("");
    setPriority("low");
    fetchTodos();
  };

  const completeTodo = async (id) => {
    await axios.put(`/todos/${id}`, { completed: true });
    fetchTodos();
  };

  const editTodo = (todo) => {
    setTitle(todo.title);
    setPriority(todo.priority);
    setEditId(todo.id);
  };

  const deleteTodo = async (id) => {
    await axios.delete(`/todos/${id}`);
    fetchTodos();
  }
  useEffect(() => {
    fetchTodos();
  }, []);

  return (
    <div className="todo-dashboard">
      <div className="todo-container">
        <header className="todo-header">
          <h1>My Todo App</h1>
          <p>Manage your daily tasks with precision</p>
        </header>

        <div className="todo-creator shadow">
          <div className="input-group">
            <label>Task Title</label>
            <input
              value={title}
              onChange={(e) => setTitle(e.target.value)}
              placeholder="What needs to be done?"
            />
          </div>

          <div className="input-group">
            <label>Priority Level</label>
            <select value={priority} onChange={(e) => setPriority(e.target.value)}>
              <option value="low">Low Priority</option>
              <option value="medium">Medium Priority</option>
              <option value="high">High Priority</option>
            </select>
          </div>

          <button className="main-add-btn" onClick={addTodo}>
            {editId ? "Update Task" : "Add Task"}
          </button>
        </div>

        <div className="table-wrapper shadow">
          <table className="ui celled table">
            <thead>
              <tr>
                <th>Title</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              {todos.map((todo) => (
                <tr key={todo.id} className={todo.completed ? "task-done" : ""}>
                  <td className="todo-title-cell">{todo.title}</td>
                  <td>
                    <span className={`priority-badge ${todo.priority}`}>
                      {todo.priority}
                    </span>
                  </td>
                  <td>
                    <div className={`status-pill ${todo.completed ? "completed" : "pending"}`}>
                      {todo.completed ? "Done" : "In Progress"}
                    </div>
                  </td>
                  <td className="actions-cell">
                    <button className="action-btn complete" onClick={() => completeTodo(todo.id)} title="Complete">
                      <i className="check icon"></i>
                    </button>
                    <button className="action-btn edit" onClick={() => editTodo(todo)} title="Edit">
                      <i className="edit icon"></i>
                    </button>
                    <button className="action-btn delete" title="Delete" onClick={() => deleteTodo(todo.id)}>
                      <i className="trash icon"></i>
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default App;
