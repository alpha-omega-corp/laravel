<?php

declare(strict_types=1);

namespace Workbench\App\Framework;

/**
 * The framework tab's views as one row of its side column.
 *
 * The tab is one place: the projects, the business types, their contact
 * sheet, the record of the run that made them and Claude's shots of them are
 * not pages reached by a row of links over each, but the first row of the
 * controls every one of them draws, so choosing a view is the same gesture as
 * choosing anything else and
 * framework.js swaps it in without a reload. A business chosen in one view is
 * kept by the other that has businesses.
 */
final class Views
{
    /**
     * @return array{heading: string, items: list<array{label: string, badge?: string, href: string, current: bool}>}
     */
    public static function row(string $current, ?string $business = null): array
    {
        $run = Record::runs()[0] ?? null;
        $at = $business === null ? [] : ['business' => $business];

        $items = [
            ['label' => (string) __('framework.projects'), 'href' => route('framework'), 'current' => $current === 'projects'],
            ['label' => (string) __('framework.businesses.title'), 'href' => Site::url('framework.businesses', $at), 'current' => $current === 'businesses'],
            ['label' => (string) __('framework.businesses.sheet'), 'href' => Site::url('framework.sheet', $at), 'current' => $current === 'sheet'],
        ];

        if ($run !== null) {
            $items[] = ['label' => (string) __('framework.record.title'), 'badge' => $run, 'href' => route('framework.record'), 'current' => $current === 'record'];
        }

        $items[] = ['label' => (string) __('framework.shots.title'), 'badge' => (string) count(Shots::all()), 'href' => route('framework.shots'), 'current' => $current === 'shots'];

        return ['heading' => (string) __('framework.view'), 'items' => $items];
    }
}
