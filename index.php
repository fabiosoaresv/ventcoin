<?php
// Testes de uma estrutura blockchain
// Fabio Soares @fabiosoaresv fabiosoares@outlook.com.br

// corrente de blocos
$blockchain = array();

// bloco1 de transações
$block1 = [
  "transacoes" => [
    [
    "remetente" => "fabio",
    "destinatario" => "jose",
    "mensagem" => "1 BTC"
    ],
    [
    "remetente" => "mario",
    "destinatario" => "robson",
    "mensagem" => "3 BTC"
    ],
    [
    "remetente" => "joão",
    "destinatario" => "maria",
    "mensagem" => "5 BTC"
    ]
  ]
];

// bloco2 de transações
$block2= [
  "transacoes" => [
    [
    "remetente" => "melissa",
    "destinatario" => "célia",
    "mensagem" => "2 BTC"
    ],
    [
    "remetente" => "adilson",
    "destinatario" => "francielle",
    "mensagem" => "4 BTC"
    ]
  ]
];

// bloco3 de transações
$block3= [
  "transacoes" => [
    [
    "remetente" => "erineu",
    "destinatario" => "bino",
    "mensagem" => "9 BTC"
    ]
  ]
];

// bloco4 de transações
$block4= [
  "transacoes" => [
    [
      "remetente" => "bianca",
      "destinatario" => "beatriz",
      "mensagem" => "1 BTC"
    ],
    [
      "remetente" => "carla",
      "destinatario" => "lis",
      "mensagem" => "2 BTC"
    ],
    [
      "remetente" => "enrico",
      "destinatario" => "erinete",
      "mensagem" => "3 BTC"
    ]
  ]
];

// bloco5 de transações
$block5= [
  "transacoes" => [
    [
      "remetente" => "felipe",
      "destinatario" => "tadeu",
      "mensagem" => "2 BTC"
    ],
    [
      "remetente" => "rafael",
      "destinatario" => "douglas",
      "mensagem" => "6 BTC"
    ],
    [
      "remetente" => "raquel",
      "destinatario" => "donizete",
      "mensagem" => "3 BTC"
    ],
    [
      "remetente" => "aparecido",
      "destinatario" => "angela",
      "mensagem" => "1 BTC"
    ]
  ]
];

// função para inserir os blocos na blockchain
function AddBlock($new_block){
  global $blockchain;

  // valida se a blockchain está vazia
  if($blockchain == array()) {
  // se sim, cria o primeiro bloco
    $new_block["hash"] = hash("sha256", json_encode($new_block));
  }else {
    // se não, pega o último bloco
    $last_block = end($blockchain);

    // adiciona o hash anterior
    $new_block["hash"] = $last_block["hash"];

    // altera o hash do bloco
    $new_block["hash"] = hash("sha256", json_encode($new_block));
  }
}

array_push($blockchain, $new_block);

// Testes
AddBlock($block1);
AddBlock($block2);
AddBlock($block3);
AddBlock($block4);
AddBlock($block5);

// Exibindo a corrente final
echo "<h2>Resultado da Blockchain:</h2><br/>";
foreach ($blockchain as $key => $block) {
  $position = $key + 1;
  echo 'Bloco: #'.$position.' - '.$block['hash'].'<br/>';
  foreach ($block['transacoes'] as $transaction) {
    echo "  - Tx: ".$transaction['remetente']." -> ".$transaction.['destinatario']." - "
      .$transaction.['mensagem']."<br/>";
  }
  echo "<br/><br/>";
}
  print_r($blockchain);
exit;
?>
