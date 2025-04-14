@extends('base')
@section('titulo', 'CafezinManeiro')
@section('conteudo')

<div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1559001724-fbad036dbc9e?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="card-img-top" alt="Café Latte">
            <div class="card-body">
                <h5 class="card-title">Café Latte</h5>
                <p class="card-text">Combinação suave de espresso com leite vaporizado.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1615326962740-77492d3d7f19?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="card-img-top" alt="Espresso">
            <div class="card-body">
                <h5 class="card-title">Espresso</h5>
                <p class="card-text">Clássico e encorpado, feito com grãos selecionados.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1544164559-2e64cabb6bc4?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="card-img-top" alt="Cappuccino">
            <div class="card-body">
                <h5 class="card-title">Cappuccino</h5>
                <p class="card-text">Espuma cremosa e sabor marcante. Um favorito dos fãs.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="https://plus.unsplash.com/premium_photo-1723291214437-09256cff6852?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="card-img-top" alt="Mocha">
            <div class="card-body">
                <h5 class="card-title">Mocha</h5>
                <p class="card-text">Mistura perfeita de café e chocolate.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1588252364673-d8e10e873b1c?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="card-img-top" alt="Americano">
            <div class="card-body">
                <h5 class="card-title">Americano</h5>
                <p class="card-text">Espresso diluído em água quente para um sabor mais suave.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1584462294771-1f175576057b?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="card-img-top" alt="Cold Brew">
            <div class="card-body">
                <h5 class="card-title">Cold Brew</h5>
                <p class="card-text">Extraído a frio, com sabor suave e refrescante.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="https://plus.unsplash.com/premium_photo-1723781045631-39648b2c97cf?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="card-img-top" alt="Macchiato">
            <div class="card-body">
                <h5 class="card-title">Macchiato</h5>
                <p class="card-text">Espresso com um toque de leite. Intenso e equilibrado.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src=https://images.unsplash.com/photo-1587063499334-6367fdc5e330?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="card-img-top" alt="Iced Coffee">
            <div class="card-body">
                <h5 class="card-title">Iced Coffee</h5>
                <p class="card-text">Café gelado para os dias quentes. Refrescância total!</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="https://plus.unsplash.com/premium_photo-1726729450207-807bffaf259a?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="card-img-top" alt="Brew Tradicional">
            <div class="card-body">
                <h5 class="card-title">Brew Tradicional</h5>
                <p class="card-text">Aquele café de casa, coado com carinho.</p>
            </div>
        </div>
    </div>
</div>

@stop