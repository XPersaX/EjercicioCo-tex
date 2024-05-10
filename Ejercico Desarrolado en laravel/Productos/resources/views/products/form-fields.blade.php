<label > Nombre Producto</label>
<br>
<input class="form-control form-control-lg" type="text"  value="{{ old('nombre', $product->nombre)}}" name="nombre" placeholder="Nombre del producto" >
@error('nombre')
<br>
<small style="color: red">{{$message}}</small>
@enderror
<br>
<label > Cantidad Producto</label>
<br>
<input class="form-control form-control-lg" type="number" min="1" value="{{ old('cantidad',$product->cantidad) }}" name="cantidad" placeholder="Cantidad del producto">
@error('cantidad')
<br>
<small style="color: red">{{$message}}</small>
@enderror