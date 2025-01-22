import { useState } from "react";
import axios from "axios";

function ForgotPassword() {
    const [email, setEmail] = useState("");
    const [error, setError] = useState<string | null>(null);

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();

        try {
            // Usa axios.post() ao invés de fetch()
            const response = await axios.post("/api/password/forgot", {
                email,
            });

            // Se chegou até aqui, o status deve ser 2xx
            // 'data' contém a resposta do backend
            const data = response.data;

            // Redireciona
            window.location.href = `/forgot-password/verify?email=${encodeURIComponent(email)}`;
        } catch (err: any) {
            // Se for erro de validação ou status != 2xx
            if (err.response) {
                setError(err.response.data.message || "Erro ao enviar email");
            } else {
                setError("Erro de conexão");
            }
        }
    };

    return (
        <div className="flex flex-col md:flex-row min-h-screen bg-[url('src/assets/img-login.png')] bg-cover bg-center">
            {/* Lado Esquerdo (Imagem) */}
            {/* Se quiser que esse lado fique "vazio" mas mostre a imagem ao fundo */}
            <div className="flex items-center justify-center w-full md:w-0 xl:w-1/2 2xl:w-7/12">
                {/* Imagem posicionada de forma absoluta */}
                <img
                    src="src/assets/logo.png"
                    alt="logo"
                    className="m-auto w-96 h-96"
                />
            </div>

            {/* Lado Direito (Formulário de Registro) */}
            {/* Usando flex + items-center + justify-center para centralizar */}
            <div className="flex items-center justify-center w-full m-8 md:w-full xl:w-1/2 2xl:w-5/12">
                <div className="max-w-2xl p-8 bg-white lg:min-w-2xl rounded-2xl">
                    <h2 className="text-3xl font-semibold text-center">
                        Esqueceu sua Senha?
                    </h2>
                    <p className="mt-2 mb-4 text-center text-gray-400">
                        Insira seu email e enviaramos uma mensagem com as instruções para recuperação de senha.
                    </p>

                    <form onSubmit={handleSubmit}>
                        {error && <p className="mb-4 text-red-500">{error}</p>}

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

export default ForgotPassword;
