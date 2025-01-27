import { Navigate } from "react-router-dom";
import { useAuth } from "../contexts/AuthContext";

const GuestRoute = ({
  redirectTo,
  children,
}: {
  redirectTo: string;
  children: JSX.Element;
}) => {
  const { isAuthenticated } = useAuth();

  if (isAuthenticated) {
    return <Navigate to={redirectTo} />;
  }

  return children;
};

export default GuestRoute;
