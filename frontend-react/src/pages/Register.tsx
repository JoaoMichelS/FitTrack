import { useState } from "react";
import { FaGoogle, FaFacebook } from "react-icons/fa";
import { FaXTwitter } from "react-icons/fa6";
import axios from "axios";

export default function Register() {
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [password_confirmation, setPasswordConfirmation] = useState("");
    const [error, setError] = useState("");

    function loginWithGoogle() {
        window.location.href = `${import.meta.env.VITE_WEB_URL}/auth/redirect/google`;
    }

    function loginWithTwitter() {
        window.location.href = `${import.meta.env.VITE_WEB_URL}/auth/redirect/twitter-oauth2`;
    }

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        console.log(name, email, password, password_confirmation);
        try {
            const response = await axios.post("/api/register", {
                name,
                email,
                password,
                password_confirmation,
            });

            window.location.href = "/dashboard";
        } catch (err: any) {
            if (err.response) {
                setError(err.response.data.message || "Erro ao criar conta");
            } else {
                setError("Erro de conexão");
            }
        }
    };

    return (
        <div className="flex flex-col md:flex-row min-h-screen bg-[url('src/assets/img-login.png')] bg-cover bg-center">
            {/* Lado Esquerdo (Imagem) */}
            {/* Se quiser que esse lado fique "vazio" mas mostre a imagem ao fundo */}
            <div className="w-full md:w-0 xl:w-1/2 2xl:w-7/12 flex items-center justify-center">
                {/* Imagem posicionada de forma absoluta */}
                <img
                    src="src/assets/logo.png"
                    alt="logo"
                    className="w-96 h-96 m-auto"
                />
            </div>

            {/* Lado Direito (Formulário de Registro) */}
            {/* Usando flex + items-center + justify-center para centralizar */}
            <div className="w-full md:w-full xl:w-1/2 2xl:w-5/12 flex items-center justify-center m-8">
                <div className="max-w-2xl lg:min-w-2xl bg-white rounded-2xl p-8">
                    <h2 className="text-3xl text-center font-semibold">
                        Crie sua conta
                    </h2>
                    <p className="text-gray-400 mt-2 mb-4 text-center">
                        Preencha os campos abaixo para criar sua conta e
                        alavancar sua rotina saudável.
                    </p>

                    <form onSubmit={handleSubmit}>
                        {error && <p className="text-red-500 mb-4">{error}</p>}

                        <div className="mb-4">
                            <label
                                htmlFor="nome"
                                className="block mb-2 font-medium"
                            >
                                Nome
                            </label>
                            <input
                                type="text"
                                id="nome"
                                placeholder="Nome"
                                value={name}
                                onChange={(e) => setName(e.target.value)}
                                required
                                className="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500"
                            />
                        </div>

                        <div className="mb-4">
                            <label
                                htmlFor="email"
                                className="block mb-2 font-medium"
                            >
                                Email
                            </label>
                            <input
                                type="email"
                                id="email"
                                placeholder="email@exemplo.com"
                                value={email}
                                onChange={(e) => setEmail(e.target.value)}
                                required
                                className="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500"
                            />
                        </div>

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
                            className="w-full bg-primary-500 text-white py-3 rounded-md hover:bg-primary-600"
                        >
                            Entrar com Email
                        </button>

                        <div className="mt-1 text-center">
                            <span className="text-sm text-gray-700 mr-1">
                                Já possui uma conta?
                            </span>
                            <a
                                href="/login"
                                className="text-sm underline text-primary-500"
                            >
                                Entrar
                            </a>
                        </div>
                    </form>

                    <div className="my-6 flex items-center">
                        <div className="border-t border-gray-300 w-full" />
                        <span className="mx-4 text-gray-500 whitespace-nowrap">
                            OU CONTINUE COM
                        </span>
                        <div className="border-t border-gray-300 w-full" />
                    </div>

                    <div className="flex justify-center items-center gap-x-4">
                        <button
                            type="button"
                            onClick={loginWithGoogle}
                            className="flex items-center justify-center border px-6 py-3 rounded-md hover:bg-gray-100"
                        >
                            <FaGoogle className="text-2xl" />
                        </button>

                        <button
                            type="button"
                            className="flex items-center justify-center border px-6 py-3 rounded-md hover:bg-gray-100"
                        >
                            <FaFacebook className="text-2xl" />
                        </button>

                        <button
                            type="button"
                            onClick={loginWithTwitter}
                            className="flex items-center justify-center border px-6 py-3 rounded-md hover:bg-gray-100"
                        >
                            <FaXTwitter className="text-2xl" />
                        </button>
                    </div>

                    <p className="text-sm text-center text-gray-500 mt-6">
                        Ao clicar em continuar, você concorda com nossos{" "}
                        <a href="#" className="underline">
                            Termos de Serviço
                        </a>{" "}
                        e{" "}
                        <a href="#" className="underline">
                            Politica de Privacidade
                        </a>
                        .
                    </p>
                </div>
            </div>
        </div>
    );
}
