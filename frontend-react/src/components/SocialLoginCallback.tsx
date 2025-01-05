import React, { useEffect } from 'react';
import { useSearchParams } from 'react-router-dom';

function SocialLoginCallback() {
  const [searchParams] = useSearchParams();

  useEffect(() => {
    const token = searchParams.get('token');
    if (token) {
      localStorage.setItem('access_token', token);
      window.location.href = '/';
    } else {
      window.location.href = '/login?error=Token not found';
    }
  }, [searchParams]);

  return <div>Processando login social...</div>;
}

export default SocialLoginCallback;
