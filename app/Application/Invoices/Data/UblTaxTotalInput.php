<?php

namespace App\Application\Invoices\Data;

final readonly class UblTaxTotalInput
{
    /**
     * @param  list<UblTaxSubtotalInput>  $taxSubtotals
     */
    public function __construct(
        public string $taxAmount,
        public array $taxSubtotals,
    ) {
        if (! preg_match('/^[+-]?(?:\d+(?:\.\d*)?|\.\d+)$/D', $taxAmount)) {
            throw new \InvalidArgumentException('Tax total amount must be an XML decimal.');
        }
        if ($taxSubtotals === [] || ! array_is_list($taxSubtotals)) {
            throw new \InvalidArgumentException('A supplied tax total must contain at least one subtotal.');
        }

        $schemeIds = [];
        foreach ($taxSubtotals as $subtotal) {
            if (! $subtotal instanceof UblTaxSubtotalInput) {
                throw new \InvalidArgumentException('Tax subtotals must be UblTaxSubtotalInput values.');
            }
            $schemeIds[$subtotal->taxSchemeId] = true;
        }
        if (count($schemeIds) !== 1) {
            throw new \InvalidArgumentException('All subtotals in a tax total must use the same supplied tax scheme.');
        }
    }
}
