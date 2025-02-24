{{-- CREATE MODAL --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Crear Coche</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <div class="mb-3">
                        <label for="createMarca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="createMarca" name="marca">
                    </div>
                    <div class="mb-3">
                        <label for="createModelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="createModelo" name="modelo">
                    </div>
                    <div class="mb-3">
                        <label for="createAnio" class="form-label">Año</label>
                        <input type="number" class="form-control" id="createAnio" name="anio" min="1886">
                    </div>
                    <div class="mb-3">
                        <label for="createColor" class="form-label">Color</label>
                        <input type="text" class="form-control" id="createColor" name="color">
                    </div>
                    <div class="mb-3">
                        <label for="createPrecio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="createPrecio" name="precio" min="0">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalCreateWarning">Ocurrió un error. El coche no ha sido creado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalCreateButton">Crear</button>
            </div>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Editar Coche</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="mb-3">
                        <label for="editId" class="form-label">Id</label>
                        <input disabled readonly type="text" class="form-control" id="editId">
                    </div>
                    <div class="mb-3">
                        <label for="editMarca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="editMarca" name="marca">
                    </div>
                    <div class="mb-3">
                        <label for="editModelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="editModelo" name="modelo">
                    </div>
                    <div class="mb-3">
                        <label for="editAnio" class="form-label">Año</label>
                        <input type="number" class="form-control" id="editAnio" name="anio" min="1886">
                    </div>
                    <div class="mb-3">
                        <label for="editColor" class="form-label">Color</label>
                        <input type="text" class="form-control" id="editColor" name="color">
                    </div>
                    <div class="mb-3">
                        <label for="editPrecio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="editPrecio" name="precio" min="0">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalEditWarning">Ha ocurrido un error. El coche no ha sido editado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalEditButton">Editar</button>
            </div>
        </div>
    </div>
</div>

{{-- VIEW MODAL --}}
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewModalLabel">Ver Coche</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="viewForm">
                    <div class="mb-3">
                        <label for="viewId" class="form-label">Id</label>
                        <input disabled readonly type="text" class="form-control" id="viewId">
                    </div>
                    <div class="mb-3">
                        <label for="viewMarca" class="form-label">Marca</label>
                        <input disabled readonly type="text" class="form-control" id="viewMarca">
                    </div>
                    <div class="mb-3">
                        <label for="viewModelo" class="form-label">Modelo</label>
                        <input disabled readonly type="text" class="form-control" id="viewModelo">
                    </div>
                    <div class="mb-3">
                        <label for="viewAnio" class="form-label">Año</label>
                        <input disabled readonly type="number" class="form-control" id="viewAnio">
                    </div>
                    <div class="mb-3">
                        <label for="viewColor" class="form-label">Color</label>
                        <input disabled readonly type="text" class="form-control" id="viewColor">
                    </div>
                    <div class="mb-3">
                        <label for="viewPrecio" class="form-label">Precio</label>
                        <input disabled readonly type="number" step="0.01" class="form-control" id="viewPrecio">
                    </div>
                    <div class="mb-3">
                        <label for="viewCreatedAt" class="form-label">Creado el</label>
                        <input disabled readonly type="datetime" class="form-control" id="viewCreatedAt">
                    </div>
                    <div class="mb-3">
                        <label for="viewUpdatedAt" class="form-label">Actualizado el</label>
                        <input disabled readonly type="datetime" class="form-control" id="viewUpdatedAt">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalViewWarning">Ocurrió un error. Coche no encontrado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

{{-- DELETE MODAL --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Coche</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="deleteForm">
                    <div class="mb-3">
                        <label for="deleteMarca" class="form-label">Marca</label>
                        <input readonly disabled type="text" class="form-control" id="deleteMarca" name="marca">
                    </div>
                    <div class="mb-3">
                        <label for="deleteModelo" class="form-label">Modelo</label>
                        <input readonly disabled type="text" class="form-control" id="deleteModelo" name="modelo">
                    </div>
                    <div class="mb-3">
                        <label for="deleteAnio" class="form-label">Año</label>
                        <input readonly disabled type="number" class="form-control" id="deleteAnio" name="anio">
                    </div>
                    <div class="mb-3">
                        <label for="deleteColor" class="form-label">Color</label>
                        <input readonly disabled type="text" class="form-control" id="deleteColor" name="color">
                    </div>
                    <div class="mb-3">
                        <label for="deletePrecio" class="form-label">Precio</label>
                        <input readonly disabled type="number" step="0.01" class="form-control" id="deletePrecio" name="precio">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalDeleteWarning">Ocurrió un error. El coche no ha sido eliminado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="modalDeleteButton">Eliminar</button>
            </div>
        </div>
    </div>
</div>

{{-- LOGIN MODAL --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalViewWarning">Ocurrió un error. Usuario no creado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalLoginUserButton">Login</button>
            </div>
        </div>
    </div>
</div>

{{-- REGISTER MODAL --}}
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerModalLabel">Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="registerForm">
                    <div class="mb-3">
                        <label for="registerName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="registerName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="registerEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="registerConfirmPassword" name="password_confirmation">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalViewWarning">Ocurrió un error. Usuario no creado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalRegisterUserButton">Register</button>
            </div>
        </div>
    </div>
</div>