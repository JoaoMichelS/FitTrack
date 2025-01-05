import React from 'react';
import { Navigate } from 'react-router-dom';

type ProtectedRouteProps = {
  children: JSX.Element;
};

const ProtectedRoute = ({ children }: ProtectedRouteProps) => {
  // Verifica se há token no localStorage (ou use o contexto de Auth)
  const token = localStorage.getItem('access_token');

  if (!token) {
    // Se não estiver autenticado, redireciona para /login
    return <Navigate to="/login" replace />;
  }

  // Se estiver autenticado, renderiza o componente filho
  return children;
};

export default ProtectedRoute;
