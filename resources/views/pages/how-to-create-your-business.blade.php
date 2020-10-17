@extends('layouts.app')
@section('content')
    <section class="">
        <div class="ventages">
            <div class="ven-img">
                <img src="{{asset('images/ventajas.png')}}">
            </div>
            <div class="ven-con">
                <h2>Abre tu tienda Digital
                    ¡Solo pagas por venta realizada!</h2>
            </div>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">


                    <div class="puedes-area">

                        <h2>Ventajas</h2>
                        <h5>Puedes crear tu tienda digital
                            Añadir tus productos
                            Administrar tus pedidos
                            Conocer quienes son tus clientes</h5>
                        <h3>¡Llegar a más clientes!</h3>
                        <h3>¿Cómo abrir tu tienda digital?</h3>
                        <div class="register-btn">
                            <a href="{{route('bus/signup')}}">Registrate</a>
                        </div>
                        <p>Tendrás acceso a tu tienda digital después de tu registro
                            Empieza a añadir productos</p>
                        <h3>¡Asi de sencillo!</h3>
                        <p>Si no tienes tiempo para crear tu tienda digital y estas interesado puedes contactarnos a:</p>
                        <p>Telefono: <a href="tel:+34 673 74 74 46">+34 673 74 74 46</a></p>
                        <p>Email: <a href="mailto:info@cercademi.me">info@cercademi.me</a></p>
                        <h2>Precios</h2>
                        <p>Tiendas de Electrodomesticos, Técnologia y electronicos (Móviles, Ordenadores, etc):
                            Comisón 15% del precio del producto
                            Otros Productos: Comisión 20% del precio del producto
                            Restaurantes Reservas: 2€ por persona
                            Restaurantes Pedidos: 20% del total del pedido</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
