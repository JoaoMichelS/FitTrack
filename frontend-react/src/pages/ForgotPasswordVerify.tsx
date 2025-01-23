import { useState, useRef, useEffect } from "react";
import axios from "axios";
import imgLogin from "../assets/img-login.png";
import imgLogo from "../assets/logo.png";
import { useLocation } from "react-router-dom";

function ForgotPasswordVerify() {
    const [code, setCode] = useState<string[]>(Array(6).fill(""));
    const [email, setEmail] = useState("");
    const [error, setError] = useState<string | null>(null);
    const inputsRef = useRef<(HTMLInputElement | null)[]>([]);
    const location = useLocation();

    useEffect(() => {
        const params = new URLSearchParams(location.search);
        const emailParam = params.get("email");
        if (emailParam) {
            setEmail(emailParam);
        }
    }, [location]);

    const handleInputChange = (index: number, value: string) => {
        if (/^\d?$/.test(value)) {
            const updatedCode = [...code];
            updatedCode[index] = value;
            setCode(updatedCode);

            if (value && index < code.length - 1) {
                inputsRef.current[index + 1]?.focus();
            }
        }
    };

    const handleKeyDown = (index: number, e: React.KeyboardEvent) => {
        if (e.key === "Backspace" && !code[index] && index > 0) {
            inputsRef.current[index - 1]?.focus();
        }
    };

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        const fullCode = code.join("");

        if (fullCode.length !== 6) {
            setError("O código deve ter 6 dígitos.");
            return;
        }

        try {
            const response = await axios.post("/api/password/verify", {
                email,
                code: fullCode,
            });

            // Pass email and code in the redirect
            window.location.href = `/forgot-password/verify/reset?email=${encodeURIComponent(email)}&code=${fullCode}`;
        } catch (err: any) {
            if (err.response) {
                setError(err.response.data.message || "Erro ao validar código");
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
                        Verificação de Email
                    </h2>
                    <p className="mt-2 mb-4 text-center text-gray-400">
                        Insira o código recebido no email para redefinir sua senha.
                    </p>

                    <form onSubmit={handleSubmit}>
                        {error && <p className="mb-4 text-red-500">{error}</p>}

                        <div className="flex justify-between mb-6">
                            {code.map((digit, index) => (
                                <input
                                    key={index}
                                    type="text"
                                    value={digit}
                                    maxLength={1}
                                    ref={(el) => (inputsRef.current[index] = el)}
                                    onChange={(e) => handleInputChange(index, e.target.value)}
                                    onKeyDown={(e) => handleKeyDown(index, e)}
                                    className="w-16 h-16 text-2xl font-semibold text-center border rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500"
                                />
                            ))}
                        </div>

                        <button
                            type="submit"
                            className="w-full py-3 text-white rounded-md bg-primary-500 hover:bg-primary-600"
                        >
                            Verificar Código
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

export default ForgotPasswordVerify;
