import RPi.GPIO as GPIO
import sys

# Setup
POWER_LED_PIN = 18  # Replace with your actual GPIO pin number for POWER LED
CONNECTION_LED_PIN = 23  # Replace with your actual GPIO pin number for CONNECTION LED

GPIO.setmode(GPIO.BCM)
GPIO.setup(POWER_LED_PIN, GPIO.OUT)
GPIO.setup(CONNECTION_LED_PIN, GPIO.OUT)

def toggle_led(pin, state):
    if state == 'on':
        GPIO.output(pin, GPIO.HIGH)
        print(f"LED on pin {pin} is ON")
    else:
        GPIO.output(pin, GPIO.LOW)
        print(f"LED on pin {pin} is OFF")

if __name__ == "__main__":
    led_type = sys.argv[1]  # 'power' or 'connection'
    state = sys.argv[2]  # 'on' or 'off'
    
    if led_type == 'power':
        toggle_led(POWER_LED_PIN, state)
    elif led_type == 'connection':
        toggle_led(CONNECTION_LED_PIN, state)
    
    GPIO.cleanup()
