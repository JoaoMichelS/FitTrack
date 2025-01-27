import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Login from "./pages/Login";
import "./index.css";
import Register from "./pages/Register";
import SocialLoginCallback from "./components/SocialLoginCallback";
import ProtectedRoute from "./components/ProtectedRoute";
import Home from "./pages/Home";
import ForgotPassword from "./pages/ForgotPassword";
import ForgotPasswordVerify from "./pages/ForgotPasswordVerify";
import ForgotPasswordReset from "./pages/ForgotPasswordReset";
import { AuthProvider } from "./contexts/AuthContext";
import GuestRoute from "./components/GuestRoute";

ReactDOM.createRoot(document.getElementById("root")!).render(
  <AuthProvider>
    <BrowserRouter>
      <Routes>
        <Route
          path="/login"
          element={
            <GuestRoute redirectTo="/">
              <Login />
            </GuestRoute>
          }
        />
        <Route
          path="/register"
          element={
            <GuestRoute redirectTo="/">
              <Register />
            </GuestRoute>
          }
        />
        <Route
          path="/forgot-password"
          element={
            <GuestRoute redirectTo="/">
              <ForgotPassword />
            </GuestRoute>
          }
        />
        <Route
          path="/forgot-password/verify"
          element={
            <GuestRoute redirectTo="/">
              <ForgotPasswordVerify />
            </GuestRoute>
          }
        />
        <Route
          path="/forgot-password/verify/reset"
          element={
            <GuestRoute redirectTo="/">
              <ForgotPasswordReset />
            </GuestRoute>
          }
        />
        <Route
          path="/social-login"
          element={
            <GuestRoute redirectTo="/">
              <SocialLoginCallback />
            </GuestRoute>
          }
        />
        <Route
          path="/"
          element={
            <ProtectedRoute>
              <Home />
            </ProtectedRoute>
          }
        />
      </Routes>
    </BrowserRouter>
  </AuthProvider>
);
