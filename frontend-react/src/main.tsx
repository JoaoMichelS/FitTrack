import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Login from "./pages/Login";
import "./index.css";
import Register from "./pages/Register";
import SocialLoginCallback from "./components/SocialLoginCallback";
import ProtectedRoute from "./components/ProtectedRoute";
import Home from "./pages/Home"
import ForgotPassword from "./pages/ForgotPassword";
import ForgotPasswordVerify from "./pages/ForgotPasswordVerify";

ReactDOM.createRoot(document.getElementById("root")!).render(
    <BrowserRouter>
        <Routes>
            <Route path="/login" element={<Login />} />
            <Route path="/register" element={<Register />} />
            <Route path="/forgot-password" element={<ForgotPassword />} />
            <Route path="/forgot-password/verify" element={<ForgotPasswordVerify />} />
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
