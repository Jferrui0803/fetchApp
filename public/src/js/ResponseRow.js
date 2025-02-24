export default class ResponseRow {
    constructor(parent) {
        this.parent = parent;
    }

    add({ id, marca, modelo, anio, color, precio }) {
        // Creamos la fila con bordes y padding
        const row = document.createElement('div');
        row.classList.add('row', 'border-bottom', 'py-2', 'align-items-center');

        // Creamos cada celda con un ancho definido y padding
        const idCell = this.createCell(id, 'col-1');
        const marcaCell = this.createCell(marca, 'col-2');
        const modeloCell = this.createCell(modelo, 'col-2');
        const anioCell = this.createCell(anio, 'col-1');
        const colorCell = this.createCell(color, 'col-2');
        const precioCell = this.createCell(precio, 'col-2');

        // Contenedor de botones, se ubica en la última celda, con botones agrupados
        const btnCell = document.createElement('div');
        btnCell.classList.add('col-2');

        const btnGroup = document.createElement('div');
        btnGroup.classList.add('btn-group');

        // Botón para ver
        const btnView = this.createButton('View', 'btn-primary', '#viewModal', id, { marca, modelo, anio, color, precio });
        // Botón para editar
        const btnEdit = this.createButton('Edit', 'btn-warning', '#editModal', id, { marca, modelo, anio, color, precio });
        // Botón para eliminar
        const btnDelete = this.createButton('Delete', 'btn-danger', '#deleteModal', id, { marca, modelo, anio, color, precio });

        // Se añaden los botones al grupo y éste a la celda
        btnGroup.append(btnView, btnEdit, btnDelete);
        btnCell.appendChild(btnGroup);

        // Se agregan todas las celdas a la fila
        row.append(idCell, marcaCell, modeloCell, anioCell, colorCell, precioCell, btnCell);

        // Se añade la fila al contenedor principal
        this.parent.appendChild(row);
    }

    // Método para crear una celda con estilo de "tabla"
    createCell(value, colClass) {
        const cell = document.createElement('div');
        cell.classList.add(colClass);
        cell.textContent = value;
        cell.style.padding = '0.5rem';
        return cell;
    }

    // Método para crear los botones con atributos y datos necesarios
    createButton(text, btnClass, targetModal, id, data) {
        const btn = document.createElement('a');
        btn.classList.add('btn', 'btn-sm', btnClass);
        btn.textContent = text;
        btn.setAttribute('data-bs-toggle', 'modal');
        btn.setAttribute('data-bs-target', targetModal);
        btn.dataset.id = id;
        for (let key in data) {
            btn.dataset[key] = data[key];
        }
        btn.dataset.url = '/cars/' + id;
        // Asigna el método de la petición según el texto del botón
        switch (text.toLowerCase()) {
            case 'view':
                btn.dataset.method = 'get';
                break;
            case 'edit':
                btn.dataset.method = 'put';
                break;
            case 'delete':
                btn.dataset.method = 'delete';
                break;
        }
        return btn;
    }
}