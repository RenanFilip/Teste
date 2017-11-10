<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Share your python code</title>
  <meta name="description" content="Skulpt">
  <meta name="author" content="Stephan Klinger">

  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Bootstrap files -->
  <!-- CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <!-- Optional theme -->
  <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style>
    pre {
      border: 0;
      background-color: #fff;
    }
  </style>
</head>

<body>
  <div class="container">
    <div>
      <h1 class="text-center">Share your Python code</h1>
    </div>
    <div id="url">

    </div>
    <div class="row">
      <div class="col-md-6">
        <form>
          <textarea id="yourcode" cols="60" rows="15"></textarea>
          <br>
          <button type="button" id="myBtn" onclick="runit()" class="btn btn-primary">Run</button>
        </form>
      </div>
      <div class="col-md-6">
        <!-- If you want turtle graphics include a canvas -->
        <canvas id="mycanvas"></canvas>
        <pre id="output"></pre>
        <?php
          $a[] = "<script>
          document.getElementById('myBtn').addEventListener('click', function () {
            document.write(runit().innerHTML);
          });
          </script>";
          $valor = (string)$a[0];
          echo $valor;
          if ($valor == "teste") {
            echo "string";
          }
          // if ($variavelphp == 'teste') {
          //   echo "$variavelphp";
          // } else {
          //   echo "string";
          // }
        ?>
        <p><?php
        ?></p>
      </div>
    </div>
  </div>
  <!-- JavaScript -->
  <script src="//code.jquery.com/jquery-2.1.0.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="skulpt.min.js" type="text/javascript"></script>
  <script src="skulpt-stdlib.js" type="text/javascript"></script>

  <script type="text/javascript">
    // output functions are configurable.  This one just appends some text
    // to a pre element.
    var teste = document.getElementById("output");
    function outf(text) {
      var mypre = document.getElementById("output");
      mypre.innerHTML = mypre.innerHTML + text;
    }

    function builtinRead(x) {
        if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined) throw "File not found: '" + x + "'";
        return Sk.builtinFiles["files"][x];
      }
      // Here's everything you need to run a python program in skulpt
      // grab the code from your textarea
      // get a reference to your pre element for output
      // configure the output function
      // call Sk.importMainWithBody()
    function runit() {
        var prog = document.getElementById("yourcode").value;
        var mypre = document.getElementById("output");
        mypre.innerHTML = '';
        //Sk.canvas = "mycanvas";
        Sk.pre = "output";
        Sk.configure({
          output: outf,
          read: builtinRead
        });
        try {
          eval(Sk.importMainWithBody("<stdin>", false, prog));
        } catch (e) {
          alert(e.toString())
        }
        // teste =  = document.getElementById("output");
        return teste;
      }
      var teste2 = runit();
      // document.getElementById("myBtn").addEventListener("click", function () {
      //   var teste2 = runit();
      //   alert(teste2.innerHTML);
      // });
  </script>
</body>

</html>
