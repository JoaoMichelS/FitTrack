import { useState, useEffect } from "react";
import axios from "axios";
import { useLocation } from "react-router-dom";
import imgLogin from "../assets/img-login.png";
import imgLogo from "../assets/logo.png";

function ForgotPasswordReset() {
    const [email, setEmail] = useState("");
    const [code, setCode] = useState("");
    const [password, setPassword] = useState("");
    const [password_confirmation, setPasswordConfirmation] = useState("");
    const [error, setError] = useState<string | null>(null);
    const location = useLocation();

    useEffect(() => {
        const params = new URLSearchParams(location.search);
        const emailParam = params.get("email");
        const codeParam = params.get("code");

        if (emailParam) setEmail(emailParam);
        if (codeParam) setCode(codeParam);
    }, [location]);

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();

        if (password !== password_confirmation) {
            setError("As senhas não coincidem.");
            return;
        }

        try {
            const response = await axios.post("/api/password/reset", {
                email,
                code,
                password,
                password_confirmation
            });

            window.location.href = "/login";
        } catch (err: any) {
            if (err.response) {
                setError(err.response.data.message || "Erro ao redefinir senha");
            } else {
                setError("Erro de conexão");
            }
        }
    };

    return (
        <div
            className="flex flex-col min-h-screen bg-center bg-cover md:flex-row"
            style={{ backgroundImage: `url(${imgLogin})` }}
        >
            {/* Lado Esquerdo (Imagem) */}
            <div className="flex items-center justify-center w-full md:w-0 xl:w-1/2 2xl:w-7/12">
                <img
                    src={imgLogo}
                    alt="logo"
                    className="m-auto w-96 h-96"
                />
            </div>

            {/* Lado Direito (Formulário) */}
            <div className="flex items-center justify-center w-full m-8 md:w-full xl:w-1/2 2xl:w-5/12">
                <div className="max-w-2xl p-8 bg-white lg:min-w-2xl rounded-2xl">
                    <h2 className="text-3xl font-semibold text-center">
                        Defina sua nova senha
                    </h2>
                    <p className="mt-2 mb-4 text-center text-gray-400">
                        Defina sua senha e confirme ela novamente no segundo campo.
                    </p>

                    <form onSubmit={handleSubmit}>
                        {error && <p className="mb-4 text-red-500">{error}</p>}

                        <div className="mb-4">
                            <label
                                htmlFor="password"
                                className="block mb-2 font-medium"
                            >
                                Senha
                            </label>
                            <input
                                type="password"
                                id="password"
                                placeholder="Digite sua senha"
                                value={password}
                                onChange={(e) => setPassword(e.target.value)}
                                required
                                className="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500"
                            />
                        </div>

                        <div className="mb-6">
                            <label
                                htmlFor="confirmPassword"
                                className="block mb-2 font-medium"
                            >
                                Confirme sua senha
                            </label>
                            <input
                                type="password"
                                id="confirmPassword"
                                placeholder="Digite sua senha novamente"
                                value={password_confirmation}
                                onChange={(e) =>
                                    setPasswordConfirmation(e.target.value)
                                }
                                required
                                className="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500"
                            />
                        </div>

                        <button
                            type="submit"
                            className="w-full py-3 text-white rounded-md bg-primary-500 hover:bg-primary-600"
                        >
                            Redefinir Senha
                        </button>

                        <div className="mt-1 text-left">
                            <span className="mr-1 text-sm text-gray-700">
                                Voltar e
                            </span>
                            <a
                                href="/login"
                                className="text-sm text-gray-700 underline"
                            >
                                Entrar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}

export default ForgotPasswordReset;
