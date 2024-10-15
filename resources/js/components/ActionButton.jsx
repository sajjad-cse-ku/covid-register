import { Button } from "@mantine/core";

export default function ActionButton({ children, ...props }) {
  return (
    <Button size="sm" type="submit" {...props}>
      {children}
    </Button>
  );
}
