<?php

declare(strict_types=1);

namespace Workbench\App\Enums;

/**
 * The elements the UI kit page documents, one section each.
 *
 * One case per group in the shared kit, not one per file: the kit ships six
 * button files that differ by fill and corner, and they are one `x-kit.button`
 * with a variant here. The layout, application-shell and page-example
 * categories are absent on purpose — they are the Layouts page.
 *
 * This is the only list. The side navigation draws it, the page renders a
 * section per case in this order, and the anchor is the case's own value.
 */
enum KitComponent: string
{
    case Avatar = 'avatar';
    case Badge = 'badge';
    case Button = 'button';
    case ButtonGroup = 'button-group';
    case Dropdown = 'dropdown';

    case Alert = 'alert';
    case EmptyState = 'empty-state';

    case ActionPanel = 'action-panel';
    case Checkbox = 'checkbox';
    case Combobox = 'combobox';
    case FormLayout = 'form-layout';
    case Input = 'input';
    case RadioGroup = 'radio-group';
    case Select = 'select';
    case SignIn = 'sign-in';
    case Textarea = 'textarea';
    case Toggle = 'toggle';

    case Calendar = 'calendar';
    case DescriptionList = 'description-list';
    case Stat = 'stat';

    case Feed = 'feed';
    case GridList = 'grid-list';
    case StackedList = 'stacked-list';
    case Table = 'table';

    case Breadcrumb = 'breadcrumb';
    case CommandPalette = 'command-palette';
    case Navbar = 'navbar';
    case Pagination = 'pagination';
    case Progress = 'progress';
    case SideNav = 'side-nav';
    case Tabs = 'tabs';
    case VerticalNav = 'vertical-nav';

    case Drawer = 'drawer';
    case Modal = 'modal';
    case Notification = 'notification';

    case CardHeading = 'card-heading';
    case PageHeading = 'page-heading';
    case SectionHeading = 'section-heading';

    /** The translation key for this case: the value with its dashes as underscores. */
    private function key(): string
    {
        return str_replace('-', '_', $this->value);
    }

    public function label(): string
    {
        return __('ui_kit.element.'.$this->key().'.label');
    }

    /**
     * The one-line description shown under the section's heading.
     */
    public function summary(): string
    {
        return __('ui_kit.element.'.$this->key().'.summary');
    }

    /**
     * The Blade tag this element is written as.
     */
    public function tag(): string
    {
        return 'kit.'.$this->value;
    }

    /**
     * The kit category it was re-themed from, which is how the page and the side
     * navigation group their sections.
     */
    public function group(): string
    {
        return match ($this) {
            self::Avatar, self::Badge, self::Button, self::ButtonGroup, self::Dropdown => 'elements',
            self::Alert, self::EmptyState => 'feedback',
            self::ActionPanel, self::Checkbox, self::Combobox, self::FormLayout, self::Input,
            self::RadioGroup, self::Select, self::SignIn, self::Textarea, self::Toggle => 'forms',
            self::Calendar, self::DescriptionList, self::Stat => 'data-display',
            self::Feed, self::GridList, self::StackedList, self::Table => 'lists',
            self::Breadcrumb, self::CommandPalette, self::Navbar, self::Pagination,
            self::Progress, self::SideNav, self::Tabs, self::VerticalNav => 'navigation',
            self::Drawer, self::Modal, self::Notification => 'overlays',
            self::CardHeading, self::PageHeading, self::SectionHeading => 'headings',
        };
    }

    public function groupLabel(): string
    {
        return __('ui_kit.group.'.str_replace('-', '_', $this->group()));
    }

    /**
     * The cases of one group, in declaration order.
     *
     * @return array<int, self>
     */
    public static function inGroup(string $group): array
    {
        return array_values(array_filter(self::cases(), fn (self $case): bool => $case->group() === $group));
    }

    /**
     * Every group, in the order the cases are declared.
     *
     * @return array<int, string>
     */
    public static function groups(): array
    {
        return array_values(array_unique(array_map(fn (self $case): string => $case->group(), self::cases())));
    }

    /**
     * The rows of the side navigation: one group per kit category, each row an
     * anchor to its section on the page.
     *
     * @return array<int, array{heading: string, items: array<int, array{label: string, href: string}>}>
     */
    public static function navigation(): array
    {
        return array_map(fn (string $group): array => [
            'heading' => __('ui_kit.group.'.str_replace('-', '_', $group)),
            'items' => array_map(fn (self $case): array => [
                'label' => $case->label(),
                'href' => '#'.$case->value,
                'current' => false,
            ], self::inGroup($group)),
        ], self::groups());
    }
}
