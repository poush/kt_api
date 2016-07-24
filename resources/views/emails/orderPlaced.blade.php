<!DOCTYPE html>
<html style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
    <head style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
         <title style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >Khareed To Yaar!!</title>
    </head>
    <body style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
        <img src="http://khareedto.com/assets/images/logo.png" alt="KhareedTo" width="250px" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" />
        <h2 align="left" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >Hello Customer,</h2>
        <p style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >Thank you for placing your order. This E-Mail confirms that we have received your order.</p>
        <p style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >Your order details are as follows:</p>
        <table class="table tsble-bordered" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;border-collapse:collapse;border-spacing:0;background-color:transparent;width:100%;max-width:100%;margin-bottom:20px;" >
            <thead style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
                <tr style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
                  <th style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;text-align:left;padding-top:8px;padding-bottom:8px;padding-right:8px;padding-left:8px;line-height:1.42857143;border-top-width:1px;border-top-style:solid;border-top-color:#dddddd;vertical-align:bottom;border-bottom-width:2px;border-bottom-style:solid;border-bottom-color:#dddddd;" >Product</th>
                  <th style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;text-align:left;padding-top:8px;padding-bottom:8px;padding-right:8px;padding-left:8px;line-height:1.42857143;border-top-width:1px;border-top-style:solid;border-top-color:#dddddd;vertical-align:bottom;border-bottom-width:2px;border-bottom-style:solid;border-bottom-color:#dddddd;" >Quantity</th>
                  <th style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;text-align:left;padding-top:8px;padding-bottom:8px;padding-right:8px;padding-left:8px;line-height:1.42857143;border-top-width:1px;border-top-style:solid;border-top-color:#dddddd;vertical-align:bottom;border-bottom-width:2px;border-bottom-style:solid;border-bottom-color:#dddddd;" >Rate</th>
                  <th style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;text-align:left;padding-top:8px;padding-bottom:8px;padding-right:8px;padding-left:8px;line-height:1.42857143;border-top-width:1px;border-top-style:solid;border-top-color:#dddddd;vertical-align:bottom;border-bottom-width:2px;border-bottom-style:solid;border-bottom-color:#dddddd;" >Amount</th>
                </tr>
            </thead>
            <tbody style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
                @foreach($products as $product)

              <tr style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
                  <td style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding-top:8px;padding-bottom:8px;padding-right:8px;padding-left:8px;line-height:1.42857143;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dddddd;" >{{$product['name'] }}</td>
                  <td style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding-top:8px;padding-bottom:8px;padding-right:8px;padding-left:8px;line-height:1.42857143;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dddddd;" >{{$product['quantity'] }}</td>
                  <td style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding-top:8px;padding-bottom:8px;padding-right:8px;padding-left:8px;line-height:1.42857143;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dddddd;" >{{$product['final']/$product['quantity'] }}</td>
                  <td style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding-top:8px;padding-bottom:8px;padding-right:8px;padding-left:8px;line-height:1.42857143;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dddddd;" >{{$product['final'] }}</td>
            </tr>
              @endforeach
      </tbody>
        </table>

        <p style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >Need To make changes to your order or cancel it? No worries, mail us at <i style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >care@khareedto.com</i></p>
        <p style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" ><b style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >Disclaimer: Products once sold will not be refunded back.</b></p>
        <p style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >We Hope to see you soon,</p>
        <h4 style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >Team <a href="http://khareedto.com/home" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >KhareedTo</a> </h4>
        <h3 style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >FOLLOW US ON-</h3>
        <p style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" ><i style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >Facebook link, other links</i></p> 
    </body>
</html>

