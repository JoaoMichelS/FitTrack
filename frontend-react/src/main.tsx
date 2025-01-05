import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Login from "./pages/Login";
import "./index.css";
import Register from "./pages/Register";
import "./index.css"; // Importa o Tailwind CSS
import SocialLoginCallback from "./components/SocialLoginCallback";
import ProtectedRoute from "./components/ProtectedRoute";
import Home from "./pages/Home";

ReactDOM.createRoot(document.getElementById("root")!).render(
    <BrowserRouter>
        <Routes>
            <Route path="/login" element={<Login />} />
            <Route path="/register" element={<Register />} />
            <Route path="/social-login" element={<SocialLoginCallback />} />
            <Route path="/" element={
                <ProtectedRoute>
                  <Home />
                </ProtectedRoute>
              }
            />
        </Routes>
    </BrowserRouter>
);
