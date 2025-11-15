<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template">

	<title>Check Out</title>

	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/all.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css">

	<style>
	
	.card-visual { width: 340px; height:200px; border-radius:14px; padding:18px; color:#fff; position:relative; box-shadow:0 12px 30px rgba(0,0,0,.25); background: linear-gradient(135deg,#1f2a44 0%, #253b6a 100%); font-family: 'Poppins', sans-serif; }
	.card-chip { width:40px; height:28px; background:linear-gradient(180deg,#d6c48a,#b8953e); border-radius:4px; box-shadow:inset 0 -2px 0 rgba(0,0,0,.15); }
	.card-logo { position:absolute; right:16px; top:16px; }
	.card-number { letter-spacing:3px; font-size:18px; margin-top:24px; }
	.card-name { text-transform:uppercase; font-size:12px; margin-top:18px; }
	.card-exp { font-size:12px; }

	.form-card { display:flex; gap:20px; align-items:flex-start; }
	.payment-form { flex:1; }
	.visual-wrap { flex:0 0 340px; }

	/* Inputs estilo moderno */
	.form-control { border-radius:8px; padding:12px; }
	.small-muted { font-size:12px; color:#666; }

	.logo-inline img{ width:44px; margin-right:8px; opacity:.4 }
	.logo-inline img.active{ opacity:1 }

	.boxed-btn{ display:inline-block; padding:12px 22px; background:#f08b3f; color:#fff; border-radius:8px; border:none; cursor:pointer; }

	/* Responsive */
	@media(max-width:992px){ .form-card{flex-direction:column} .visual-wrap{order:-1} }
	</style>
</head>
<body>

	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<a class="navbar-brand logo_h" href="index.php"><img src="img/fav.png" alt=""></a>
				</div>
			</nav>
		</div>
	</header>

	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Pago seguro y</p>
						<h1>Confiable</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne">
						          Información para envio.
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form id="shippingForm">
										<p><input class="form-control" type="text" placeholder="Nombre:"></p>
										<p><input class="form-control" type="email" placeholder="Correo:"></p>
										<p><input class="form-control" type="text" placeholder="Dirección"></p>
										<p><input class="form-control" type="tel" placeholder="Telefono"></p>
										<p><textarea class="form-control" name="bill" id="bill" cols="30" rows="3" placeholder="Observaciones."></textarea></p>
								</form>
						        </div>
						      </div>
						    </div>
						  </div>

						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
						          Tarjeta de Débito/Crédito
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="form-card">
									<div class="payment-form">
										<form id="paymentForm">
											<div class="form-group">
												<label>Nombre del titular</label>
												<input type="text" class="form-control" id="cardName" required>
											</div>

											<div class="form-group">
												<label>Número de tarjeta</label>
												<input type="text" class="form-control" id="cardNumber" maxlength="19" placeholder="#### #### #### ####" required>
												<div class="d-flex align-items-center logo-inline small-muted" style="margin-top:6px;">
													<img id="logoVisa" src="img/visa.png" alt="visa">
													<img id="logoMaster" src="img/mastercard.png" alt="mastercard">
													<span id="cardTypeText" style="margin-left:8px"></span>
												</div>
											</div>

											<div class="form-row">
												<div class="col">
													<label>MM/YY</label>
													<input type="text" class="form-control" id="cardExp" maxlength="5" placeholder="MM/YY" required>
												</div>
												<div class="col">
													<label>CVC</label>
													<input type="text" class="form-control" id="cardCVC" maxlength="4" placeholder="CVC" required>
												</div>
											</div>
										</form>
									</div>

										<div class="visual-wrap">
											<div class="card-visual" id="cardVisual">
												<div class="d-flex justify-content-between">
													<div class="card-chip"></div>
													<img id="logoVisual" class="card-logo" src="img/visa.png" width="70">
												</div>
												<div class="card-number" id="visualNumber">#### #### #### ####</div>
												<div class="d-flex justify-content-between">
													<div>
														<div class="card-name" id="visualName">NOMBRE TITULAR</div>
														<div class="card-exp" id="visualExp">MM/YY</div>
													</div>
												</div>
											</div>
										</div>
									</div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Detalles de tu orden</th>
									<th></th>
								</tr>
							</thead>
							<tbody class="order-details-body"></tbody>
							<tbody class="checkout-details"></tbody>
						</table>
						<button id="btnOrder" class="boxed-btn">Crear Orden</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal de pago exitoso -->
	<div class="modal fade" id="modalPagoExitoso" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content text-center p-4">
				<i class="fa fa-check-circle" style="font-size: 70px; color: green;"></i>
				<h3 class="mt-3">Pago con Éxito</h3>
				<p>Tu transacción ha sido completada.</p>
				<button id="btnImprimirPDF" class="btn btn-primary mt-3">Imprimir Factura PDF</button>
			</div>
		</div>
	</div>

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Mas Informacion:</h6>
						<p style="color: #666;">
						“Descubre la elegancia y el lujo con nuestra exclusiva colección de joyería de las mejores marcas. Cada pieza está diseñada para resaltar tu belleza y estilo, ofreciendo calidad y sofisticación en cada detalle. Tu destino definitivo para joyas que marcan la diferencia en cada ocasión.”
						</p>
					</div>
					<div>
				<p class="footer-text m-0" style="color: #666;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
				</div>
		
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<!-- SCRIPTS -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

	<script>
	// UTIL: formatea número de tarjeta con espacios
	function formatCardNumber(value){
		return value.replace(/\\D/g,'').replace(/(.{4})/g,'$1 ').trim();
	}

	// UTIL: Luhn check
	function luhnCheck(num){
		let arr = (num + '').split('').reverse().map(x => parseInt(x));
		let sum = 0;
		for(let i=0;i<arr.length;i++){
			let val = arr[i];
			if(i % 2 === 1){ val *= 2; if(val>9) val -= 9; }
			sum += val;
		}
		return sum % 10 === 0;
	}

	// Detectar tipo por BIN
	function detectCardType(number){
		const clean = number.replace(/\\D/g,'');
		if(/^4/.test(clean)) return 'Visa';
		if(/^(5[1-5])/.test(clean) || /^(222[1-9]|22[3-9]\\d|2[3-6]\\d{2}|27[01]\\d|2720)/.test(clean)) return 'Mastercard';
		return 'Desconocida';
	}

	// Actualizar visual
	document.getElementById('cardNumber').addEventListener('input', function(e){
		this.value = formatCardNumber(this.value);
		const clean = this.value.replace(/\\s/g,'');
		const tipo = detectCardType(clean);
		const logoVisa = document.getElementById('logoVisa');
		const logoMaster = document.getElementById('logoMaster');
		const logoVisual = document.getElementById('logoVisual');
		const cardTypeText = document.getElementById('cardTypeText');
		if(tipo === 'Visa'){
			logoVisa.classList.add('active'); logoMaster.classList.remove('active'); logoVisual.src='img/visa.png'; cardTypeText.textContent='Visa';
		}else if(tipo === 'Mastercard'){
			logoMaster.classList.add('active'); logoVisa.classList.remove('active'); logoVisual.src='img/mastercard.png'; cardTypeText.textContent='Mastercard';
		}else{ logoVisa.classList.remove('active'); logoMaster.classList.remove('active'); logoVisual.src='img/credit-card.png'; cardTypeText.textContent=''; }
		document.getElementById('visualNumber').textContent = this.value || '#### #### #### ####';
	});

	document.getElementById('cardName').addEventListener('input', function(){
		document.getElementById('visualName').textContent = this.value.toUpperCase() || 'NOMBRE TITULAR';
	});

	document.getElementById('cardExp').addEventListener('input', function(){
		let v = this.value.replace(/\D/g,''); 

		if(v.length >= 3){
			this.value = v.slice(0,2) + '/' + v.slice(2,4);
		} else {
			this.value = v;
		}

		document.getElementById('visualExp').textContent = this.value || 'MM/YY';
	});


	// Cargar carrito
	function cargarCarritoEnCheckout(){
		const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
		const cuerpoTabla = document.querySelector('.order-details-body');
		const resumenTabla = document.querySelector('.checkout-details');
		cuerpoTabla.innerHTML = `<tr><td>Producto</td><td>Precio</td></tr>`;
		if(carrito.length===0){
			cuerpoTabla.innerHTML += `<tr><td colspan=\"2\">Tu carrito está vacío</td></tr>`;
			resumenTabla.innerHTML = `<tr><td>Subtotal</td><td>$0.00</td></tr><tr><td>Envio</td><td>$0.00</td></tr><tr><td>Total</td><td>$0.00</td></tr>`;
			return;
		}
		let subtotal = 0;
		carrito.forEach(producto=>{
			const totalProducto = producto.precio * producto.cantidad;
			subtotal += totalProducto;
			cuerpoTabla.innerHTML += `<tr><td>${producto.nombre} × ${producto.cantidad}</td><td>$${totalProducto.toFixed(2)}</td></tr>`;
		});
		const envio = 50;
		const total = subtotal + envio;
		resumenTabla.innerHTML = `<tr><td>Subtotal</td><td>$${subtotal.toFixed(2)}</td></tr><tr><td>Envio</td><td>$${envio.toFixed(2)}</td></tr><tr><td>Total</td><td>$${total.toFixed(2)}</td></tr>`;
	}

	document.addEventListener('DOMContentLoaded', cargarCarritoEnCheckout);

	// Manejo del botón crear orden
	document.getElementById('btnOrder').addEventListener('click', function(){
		const nombre = document.querySelector('input[placeholder=\"Nombre:\"]').value.trim();
		const correo = document.querySelector('input[placeholder=\"Correo:\"]').value.trim();
		const direccion = document.querySelector('input[placeholder=\"Dirección\"]').value.trim();
		const telefono = document.querySelector('input[placeholder=\"Telefono\"]').value.trim();

		const cardName = document.getElementById('cardName').value.trim();
		const cardNumberRaw = document.getElementById('cardNumber').value.replace(/\\s/g,'');
		const cardExp = document.getElementById('cardExp').value.trim();
		const cardCVC = document.getElementById('cardCVC').value.trim();

		if(!nombre || !correo || !direccion || !telefono){ alert('Por favor completa todos los datos de envío.'); return; }
		if(!cardName || cardNumberRaw.length < 13 || !cardExp || !(cardCVC.length===3 || cardCVC.length===4)){ alert('Por favor completa los datos de la tarjeta correctamente.'); return; }
	

		const tipo = detectCardType(cardNumberRaw);

		localStorage.setItem('pagoData', JSON.stringify({
			nombre, correo, direccion, telefono,
			cardLast4: cardNumberRaw.slice(-4),
			cardType: tipo
		}));

		// Mostrar modal (usa bootstrap)
		$('#modalPagoExitoso').modal('show');
	});

	document.getElementById('btnImprimirPDF').addEventListener('click', function(){

    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const pago = JSON.parse(localStorage.getItem('pagoData')) || {};
    const { jsPDF } = window.jspdf;

    const doc = new jsPDF();

    // ======== ESTILOS ========
    const tituloColor = "#333333";
    const textoColor = "#555555";
    const lineaColor = "#DDDDDD";

    doc.setFont("helvetica", "normal");

	
		doc.addImage('img/instagram/profile.png', 'PNG', 150, 10, 40, 40);

		// ====== TÍTULO ======
		doc.setFontSize(22);
		doc.setTextColor(tituloColor);
		doc.text("Factura de Compra", 14, 25);

		doc.setFontSize(12);
		doc.setTextColor(textoColor);
		doc.text("Joya's Charly", 14, 32);

		// Línea suave
		doc.setDrawColor(lineaColor);
		doc.line(14, 36, 196, 36);

		// ======= DATOS DEL CLIENTE =======
		doc.setFontSize(14);
		doc.setTextColor("#000000");
		doc.text("Datos del cliente", 14, 48);

		doc.setFontSize(11);
		doc.setTextColor(textoColor);

		doc.text(`Nombre: ${pago.nombre || ''}`, 14, 58);
		doc.text(`Correo: ${pago.correo || ''}`, 14, 66);
		doc.text(`Teléfono: ${pago.telefono || ''}`, 14, 74);
		doc.text(`Dirección: ${pago.direccion || ''}`, 14, 82);

		doc.text(`Tarjeta: **** **** **** ${pago.cardLast4 || '----'}`, 14, 90);
		doc.text(`Tipo de tarjeta: ${pago.cardType || 'Desconocida'}`, 14, 98);

		const fecha = new Date();
		doc.text(`Fecha: ${fecha.toLocaleDateString()}  ${fecha.toLocaleTimeString()}`, 14, 106);

		// Línea divisoria
		doc.line(14, 112, 196, 112);

		// ======= TABLA DE PRODUCTOS =======
		let y = 122;

		doc.setFontSize(14);
		doc.setTextColor("#000000");
		doc.text("Detalle de la compra", 14, y);

		y += 10;

		doc.setFontSize(11);
		doc.setTextColor(textoColor);

		doc.setDrawColor(lineaColor);
		doc.line(14, y, 196, y);

		y += 8;

		let subtotal = 0;

		carrito.forEach(p => {
			const totalProd = p.precio * p.cantidad;
			subtotal += totalProd;

			doc.text(`${p.nombre} (x${p.cantidad})`, 14, y);
			doc.text(`$${totalProd.toFixed(2)}`, 180, y, { align: "right" });

			y += 8;

			if (y > 260) {
				doc.addPage();
				y = 20;
			}
		});

		// Línea antes de totales
		doc.line(14, y, 196, y);

		// ======= TOTALES =======
		y += 10;
		doc.setFontSize(12);
		doc.setTextColor("#000000");

		doc.text("Subtotal:", 140, y);
		doc.text(`$${subtotal.toFixed(2)}`, 196, y, { align: "right" });

		y += 8;
		doc.text("Envío:", 140, y);
		doc.text("$50.00", 196, y, { align: "right" });

		y += 8;
		doc.setFontSize(14);
		doc.text("TOTAL:", 140, y);
		doc.text(`$${(subtotal + 50).toFixed(2)}`, 196, y, { align: "right" });

		// Mensaje final
		y += 20;
		doc.setFontSize(12);
		doc.setTextColor(textoColor);
		doc.text("Gracias por tu compra. ¡Vuelve pronto!", 14, y);

		// Guardar
		doc.save(`Factura_JoyasCharly.pdf`);
	});

	</script>

</body>
</html>
