import HttpClient from "./HttpClient.js";
import ResponseContent from "./ResponseContent.js";

export default class ModalEvents {
    constructor(url, csrf) {
        this.url = url;
        this.csrf = csrf;

        this.content = document.getElementById("content");
        this.userContent = document.getElementById("userContent");
        this.pagination = document.getElementById("pagination");
        this.responseContent = new ResponseContent(
            this.content,
            this.pagination,
            this.userContent
        );

        this.fetchUrl = "";
        this.httpClient = new HttpClient(this.url, this.csrf);

        // coche
        this.modalCreate = document.getElementById("createModal");
        this.modalCreateButton = document.getElementById("modalCreateButton");
        this.createMarca = document.getElementById("createMarca");
        this.createModelo = document.getElementById("createModelo");
        this.createAnio = document.getElementById("createAnio");
        this.createColor = document.getElementById("createColor");
        this.createPrecio = document.getElementById("createPrecio");

        this.modalDelete = document.getElementById("deleteModal");
        this.modalDeleteButton = document.getElementById("modalDeleteButton");
        this.deleteMarca = document.getElementById("deleteMarca");
        this.deleteModelo = document.getElementById("deleteModelo");
        this.deleteAnio = document.getElementById("deleteAnio");
        this.deleteColor = document.getElementById("deleteColor");
        this.deletePrecio = document.getElementById("deletePrecio");

        this.modalEdit = document.getElementById("editModal");
        this.modalEditButton = document.getElementById("modalEditButton");
        this.editId = document.getElementById("editId");
        this.editMarca = document.getElementById("editMarca");
        this.editModelo = document.getElementById("editModelo");
        this.editAnio = document.getElementById("editAnio");
        this.editColor = document.getElementById("editColor");
        this.editPrecio = document.getElementById("editPrecio");

        this.modalLogin = document.getElementById("loginModal");
        this.modalLoginUserButton = document.getElementById(
            "modalLoginUserButton"
        );
        this.loginEmail = document.getElementById("loginEmail");
        this.loginPassword = document.getElementById("loginPassword");

        this.modalRegister = document.getElementById("registerModal");
        this.modalRegisterUserButton = document.getElementById(
            "modalRegisterUserButton"
        );
        this.registerConfirmPassword = document.getElementById(
            "registerConfirmPassword"
        );
        this.registerEmail = document.getElementById("registerEmail");
        this.registerName = document.getElementById("registerName");
        this.registerPassword = document.getElementById("registerPassword");

        // coche
        this.modalView = document.getElementById("viewModal");
        this.viewCreatedAt = document.getElementById("viewCreatedAt");
        this.viewId = document.getElementById("viewId");
        this.viewMarca = document.getElementById("viewMarca");
        this.viewModelo = document.getElementById("viewModelo");
        this.viewAnio = document.getElementById("viewAnio");
        this.viewColor = document.getElementById("viewColor");
        this.viewPrecio = document.getElementById("viewPrecio");
        this.viewUpdatedAt = document.getElementById("viewUpdatedAt");

        this.carError = document.getElementById("carError");
        this.carSuccess = document.getElementById("carSuccess");

        this.logoutButton = document.getElementById("logoutButton");

        this.assignEvents();
    }

    assignEvents() {
        // coche
        this.modalCreate.addEventListener("show.bs.modal", (event) => {
            document.getElementById("modalCreateWarning").style.display =
                "none";
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.createMarca.value = "";
            this.createModelo.value = "";
            this.createAnio.value = "";
            this.createColor.value = "";
            this.createPrecio.value = "";
        });

        this.modalDelete.addEventListener("show.bs.modal", (event) => {
            document.getElementById("modalDeleteWarning").style.display =
                "none";
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.deleteMarca.value = event.relatedTarget.dataset.marca;
            this.deleteModelo.value = event.relatedTarget.dataset.modelo;
            this.deleteAnio.value = event.relatedTarget.dataset.anio;
            this.deleteColor.value = event.relatedTarget.dataset.color;
            this.deletePrecio.value = event.relatedTarget.dataset.precio;
        });

        this.modalEdit.addEventListener("show.bs.modal", (event) => {
            document.getElementById("modalEditWarning").style.display = "none";
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.editId.value = event.relatedTarget.dataset.id;
            this.editMarca.value = event.relatedTarget.dataset.marca;
            this.editModelo.value = event.relatedTarget.dataset.modelo;
            this.editAnio.value = event.relatedTarget.dataset.anio;
            this.editColor.value = event.relatedTarget.dataset.color;
            this.editPrecio.value = event.relatedTarget.dataset.precio;
        });

        this.modalLogin.addEventListener("show.bs.modal", (event) => {
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.loginEmail.value = "";
            this.loginPassword.value = "";
        });

        this.modalRegister.addEventListener("show.bs.modal", (event) => {
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.registerConfirmPassword.value = "";
            this.registerEmail.value = "";
            this.registerName.value = "";
            this.registerPassword.value = "";
        });

        // coche
        this.modalView.addEventListener("show.bs.modal", (event) => {
            document.getElementById("modalViewWarning").style.display = "none";
            this.viewCreatedAt.value = "";
            this.viewId.value = event.relatedTarget.dataset.id;
            this.viewMarca.value = event.relatedTarget.dataset.marca;
            this.viewModelo.value = event.relatedTarget.dataset.modelo;
            this.viewAnio.value = event.relatedTarget.dataset.anio;
            this.viewColor.value = event.relatedTarget.dataset.color;
            this.viewPrecio.value = event.relatedTarget.dataset.precio;
            this.viewUpdatedAt.value = "";
            const url = event.relatedTarget.dataset.url;
            this.httpClient.get(url, {}, (data) => this.responseShow(data));
        });

        // Evento para crear un coche
        this.modalCreateButton.addEventListener("click", (event) => {
            this.httpClient.post(
                this.fetchUrl,
                {
                    marca: this.createMarca.value,
                    modelo: this.createModelo.value,
                    anio: this.createAnio.value,
                    color: this.createColor.value,
                    precio: this.createPrecio.value,
                    page: this.responseContent.currentPage,
                },
                (data) => this.responseCreate(data)
            );
        });

        // Evento para eliminar un coche
        this.modalDeleteButton.addEventListener("click", (event) => {
            this.httpClient.delete(
                this.fetchUrl,
                {
                    page: this.responseContent.currentPage,
                },
                (data) => this.responseDelete(data)
            );
        });

        // Evento para editar un coche
        this.modalEditButton.addEventListener("click", (event) => {
            this.httpClient.put(
                this.fetchUrl,
                {
                    id: this.editId.value,
                    marca: this.editMarca.value,
                    modelo: this.editModelo.value,
                    anio: this.editAnio.value,
                    color: this.editColor.value,
                    precio: this.editPrecio.value,
                    page: this.responseContent.currentPage,
                },
                (data) => this.responseEdit(data)
            );
        });

        this.modalLoginUserButton.addEventListener("click", (event) => {
            this.httpClient.post(
                this.fetchUrl,
                {
                    email: this.loginEmail.value,
                    password: this.loginPassword.value,
                },
                (data) => this.responseLogin(data)
            );
        });

        this.modalRegisterUserButton.addEventListener("click", (event) => {
            this.httpClient.post(
                this.fetchUrl,
                {
                    name: this.registerName.value,
                    email: this.registerEmail.value,
                    password: this.registerPassword.value,
                    password_confirmation: this.registerConfirmPassword.value,
                },
                (data) => this.responseRegister(data)
            );
        });

        /*this.logoutButton.addEventListener('click', event => {
            console.log('adios');
        });*/
    }

    formattedDate(date) {
        date = new Date(date);
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(
            2,
            "0"
        )}-${String(date.getDate()).padStart(2, "0")}`;
    }

    responseCommonContent(data) {
        this.responseContent.setContent(data);
        let link = document.getElementById("logoutLink");
        if (link) {
            link.addEventListener("click", (event) => {
                this.httpClient.post(link.dataset.url, {}, (data) =>
                    console.log(data)
                );
            });
        }
    }

    responseCreate(data) {
        if (data.result) {
            this.carSuccess.style.display = "block";
            bootstrap.Modal.getInstance(this.modalCreate).hide();
            // Refresh content automatically:
            this.init();
            setTimeout(() => {
                this.carSuccess.style.display = "none";
            }, 4000);
        } else {
            document.getElementById("modalCreateWarning").style.display =
                "block";
        }
    }

    responseEdit(data) {
        if (data.result) {
            this.carSuccess.style.display = "block";
            bootstrap.Modal.getInstance(this.modalEdit).hide();
            // Refresh content automatically:
            this.init();
            setTimeout(() => {
                this.carSuccess.style.display = "none";
            }, 4000);
        } else {
            document.getElementById("modalEditWarning").style.display = "block";
        }
    }

    responseDelete(data) {
        if (data.result) {
            this.carSuccess.style.display = "block";
            bootstrap.Modal.getInstance(this.modalDelete).hide();
            // Refresh content automatically:
            this.init();
            setTimeout(() => {
                this.carSuccess.style.display = "none";
            }, 4000);
        } else {
            document.getElementById("modalDeleteWarning").style.display =
                "block";
        }
    }

    responseLogin(data) {
        if (data.result) {
            // Update user area with received user data
            this.responseContent.setUserContent(data.user);
            // Hide the login modal
            bootstrap.Modal.getInstance(this.modalLogin).hide();
            console.log("Login correcto");
            // Attach logout event handler
            this.attachLogoutHandler();
        } else {
            console.log("Error en el login: " + data.message);
            document.getElementById("modalViewWarning").style.display = "block";
        }
    }

    responseRegister(data) {
        if (data.result) {
            // Auto-login: update user area with the new user data
            this.responseContent.setUserContent(data.user);
            // Hide the register modal
            bootstrap.Modal.getInstance(this.modalRegister).hide();
            console.log("Registro correcto, usuario logueado automáticamente");
            // Attach logout event handler
            this.attachLogoutHandler();
        } else {
            console.log("Error en el registro: " + data.message);
            document.getElementById("modalViewWarning").style.display = "block";
        }
    }

    responseLogout(data) {
        if (data.result) {
            // Clear the user area to show login/register links
            this.responseContent.setUserContent(null);
            console.log("Logout correcto");
        } else {
            console.log("Error al hacer logout: " + data.message);
            document.getElementById("modalViewWarning").style.display = "block";
        }
    }

    attachLogoutHandler() {
        // Find the logout link added in setCurrentUserContent
        let logoutLink = document.getElementById("logoutLink");
        if (logoutLink) {
            logoutLink.addEventListener("click", (event) => {
                event.preventDefault();
                // Send AJAX POST to logout URL
                this.httpClient.post(logoutLink.dataset.url, {}, (data) =>
                    this.responseLogout(data)
                );
            });
        }
    }

    // coche
    responseShow(data) {
        const {
            id,
            marca,
            modelo,
            anio,
            color,
            precio,
            created_at,
            updated_at,
        } = data.car;
        this.viewCreatedAt.value = this.formattedDate(created_at);
        this.viewId.value = id;
        this.viewMarca.value = marca;
        this.viewModelo.value = modelo;
        this.viewAnio.value = anio;
        this.viewColor.value = color;
        this.viewPrecio.value = precio;
        this.viewUpdatedAt.value = this.formattedDate(updated_at);
    }

    // coche
    init() {
        this.httpClient.get("/cars", {}, (data) => {
            this.responseCommonContent(data);
        });
    }
}
