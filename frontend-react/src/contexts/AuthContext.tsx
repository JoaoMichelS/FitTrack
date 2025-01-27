import React, { createContext, useContext, ReactNode, useEffect, useState } from "react";
import Cookies from "js-cookie";

// Tipo do contexto de autenticação
interface AuthContextType {
  isAuthenticated: boolean;
  login: () => void;
  logout: () => void;
}

// Criar o contexto
const AuthContext = createContext<AuthContextType | undefined>(undefined);

// Provedor de Autenticação
export const AuthProvider = ({ children }: { children: ReactNode }) => {
  const [isAuthenticated, setIsAuthenticated] = useState(false);

  // Verificar cookie ao carregar
  useEffect(() => {
    const authCookie = Cookies.get("auth_token");
    if (authCookie) {
      setIsAuthenticated(true);
    }
  }, []);

  // Simular login (definir cookie)
  const login = () => {
    Cookies.set("auth_token", "true", { expires: 7 }); // Expires in 7 days
    setIsAuthenticated(true);
  };

  // Simular logout (remover cookie)
  const logout = () => {
    Cookies.remove("auth_token");
    setIsAuthenticated(false);
  };

  return (
    <AuthContext.Provider value={{ isAuthenticated, login, logout }}>
      {children}
    </AuthContext.Provider>
  );
};

// Hook para acessar o contexto de autenticação
export const useAuth = () => {
  const context = useContext(AuthContext);
  if (!context) {
    throw new Error("useAuth must be used within an AuthProvider");
  }
  return context;
};
