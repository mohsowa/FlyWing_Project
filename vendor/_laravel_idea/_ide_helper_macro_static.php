<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace Illuminate\Contracts\View {
    
    /**
     * @method static $this layoutData($data = [])
     * @method static $this layout($view, $params = [])
     * @method static $this extends($view, $params = [])
     * @method static $this section($section)
     * @method static $this slot($slot)
     */
    class View {}
}

namespace Illuminate\Http {
    
    /**
     * @method static array validate(array $rules, ...$params)
     * @method static void validateWithBag(string $errorBag, array $rules, ...$params)
     * @method static bool hasValidSignature($absolute = true)
     * @method static bool hasValidRelativeSignature()
     */
    class Request {}
}

namespace Illuminate\Support\Facades {
    
    /**
     * @method static void emailVerification()
     * @method static void auth($options = [])
     * @method static void resetPassword()
     * @method static void confirmPassword()
     */
    class Route {}
}

namespace Illuminate\Testing {
    
    /**
     * @method static $this assertSeeLivewire($component)
     * @method static $this assertDontSeeLivewire($component)
     */
    class TestResponse {}
    
    /**
     * @method static $this assertSeeLivewire($component)
     * @method static $this assertDontSeeLivewire($component)
     */
    class TestView {}
}

namespace Illuminate\View {

    use Livewire\WireDirective;
    
    /**
     * @method static WireDirective wire($name)
     */
    class ComponentAttributeBag {}
    
    /**
     * @method static $this layoutData($data = [])
     * @method static $this layout($view, $params = [])
     * @method static $this extends($view, $params = [])
     * @method static $this section($section)
     * @method static $this slot($slot)
     */
    class View {}
}