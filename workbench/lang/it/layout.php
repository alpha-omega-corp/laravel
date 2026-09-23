<?php

declare(strict_types=1);

/*
 * The kit’s five layouts, named once for every tab that offers them: the
 * framework tab picks one per project and screen, the Layouts page shows them all.
 */

return [
    'console' => [
        'label' => 'Console',
        'summary' => 'Una barra laterale fissa, un’intestazione di pagina e dati fitti sotto — amministrazione, back office e CRUD.',
    ],
    'workspace' => [
        'label' => 'Spazio di lavoro',
        'summary' => 'Una colonna elenco e accanto una colonna dettaglio — posta in arrivo, smistamento e collaborazione.',
    ],
    'stacked' => [
        'label' => 'Impilato',
        'summary' => 'Una barra di navigazione in alto, una fascia di intestazione e griglie di schede — cruscotti e app di prodotto.',
    ],
    'marketing' => [
        'label' => 'Marketing',
        'summary' => 'Nessun guscio applicativo: una barra di navigazione, una sequenza di sezioni e un piè di pagina — siti pubblici e landing page.',
    ],
    'focus' => [
        'label' => 'Focus',
        'summary' => 'Una sola colonna stretta, un indicatore di avanzamento e nient’altro — onboarding, pagamento e procedure guidate.',
    ],
];
